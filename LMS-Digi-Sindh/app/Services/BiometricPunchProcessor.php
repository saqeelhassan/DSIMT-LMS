<?php

namespace App\Services;

use App\Models\BiometricAttendance;
use App\Models\BiometricLog;
use Carbon\Carbon;

/**
 * Applies punch logic to raw biometric_logs and writes to biometric_attendance.
 * Rule 1: First punch of the day = Check-in.
 * Rule 2: Last punch of the day = Check-out.
 * Rule 3: Late if check-in > office_start_time + late_minutes.
 * Rule 4: Ghost/Short: if check-out - check-in < short_attendance_minutes → Invalid.
 */
class BiometricPunchProcessor
{
    public function __construct(
        protected string $officeStartTime = '09:00',
        protected int $lateAfterMinutes = 15,
        protected int $shortAttendanceMinutes = 10
    ) {
        $officeStart = config('services.biometric.office_start_time', '09:00');
        $this->officeStartTime = $officeStart;
        $this->lateAfterMinutes = (int) (config('services.biometric.late_after_minutes') ?? 15);
        $this->shortAttendanceMinutes = (int) (config('services.biometric.short_attendance_minutes') ?? 10);
    }

    /**
     * Process logs for a given date (or today). Only considers logs with user_id set.
     */
    public function processForDate(?string $date = null): array
    {
        $date = $date ? Carbon::parse($date)->toDateString() : now()->toDateString();
        $start = $date . ' 00:00:00';
        $end = $date . ' 23:59:59';

        $logs = BiometricLog::whereNotNull('user_id')
            ->whereBetween('scan_time', [$start, $end])
            ->orderBy('scan_time')
            ->get();

        $byUser = $logs->groupBy('user_id');
        $created = 0;
        $updated = 0;

        foreach ($byUser as $userId => $userLogs) {
            $sorted = $userLogs->sortBy('scan_time')->values();
            $first = $sorted->first();
            $last = $sorted->last();
            $checkIn = $first->scan_time;
            $checkOut = $first->scan_time->eq($last->scan_time) ? null : $last->scan_time;

            $status = $this->computeStatus($checkIn, $checkOut);
            $deviceId = $first->device_id;

            $record = BiometricAttendance::updateOrCreate(
                [
                    'user_id' => (int) $userId,
                    'date' => $date,
                ],
                [
                    'check_in_time' => $checkIn,
                    'check_out_time' => $checkOut,
                    'status' => $status,
                    'device_id' => $deviceId,
                ]
            );
            if ($record->wasRecentlyCreated) {
                $created++;
            } else {
                $updated++;
            }
        }

        return ['date' => $date, 'created' => $created, 'updated' => $updated];
    }

    private function computeStatus(Carbon $checkIn, ?Carbon $checkOut): string
    {
        $lateThreshold = Carbon::parse($checkIn->format('Y-m-d') . ' ' . $this->officeStartTime)
            ->addMinutes($this->lateAfterMinutes);
        if ($checkIn->gt($lateThreshold)) {
            return BiometricAttendance::STATUS_LATE;
        }

        if ($checkOut) {
            $minutes = (int) $checkIn->diffInMinutes($checkOut);
            if ($minutes < $this->shortAttendanceMinutes) {
                return BiometricAttendance::STATUS_INVALID;
            }
        }

        return BiometricAttendance::STATUS_PRESENT;
    }
}
