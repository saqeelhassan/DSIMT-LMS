<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\InstructorAttendance;
use App\Services\AttendanceIpRestrictionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function checkIn(Request $request): RedirectResponse|JsonResponse
    {
        $ipService = app(AttendanceIpRestrictionService::class);
        if (! $ipService->isAllowed()) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Check-in is only allowed from the institute network (IP not allowed).',
                ], 403);
            }

            return back()->with('error', 'Check-in is only allowed from the institute Wi‑Fi/network. Your current IP is not in the allowed list.');
        }

        $user = auth()->user();
        $today = now()->toDateString();

        $existing = InstructorAttendance::where('instructor_id', $user->id)->whereDate('date', $today)->first();

        if ($existing && $existing->check_in_time) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already checked in today at ' . $existing->check_in_time->format('g:i A') . '.',
                ], 422);
            }

            return back()->with('error', 'You have already checked in today at ' . $existing->check_in_time->format('g:i A') . '.');
        }

        InstructorAttendance::updateOrCreate(
            [
                'instructor_id' => $user->id,
                'date' => $today,
            ],
            [
                'check_in_time' => now(),
                'check_out_time' => null,
                'status' => InstructorAttendance::STATUS_PRESENT,
            ]
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Checked in successfully.',
                'check_in_time' => now()->toIso8601String(),
            ]);
        }

        return back()->with('success', 'Checked in successfully.');
    }

    public function checkOut(Request $request): RedirectResponse|JsonResponse
    {
        $user = auth()->user();
        $today = now()->toDateString();

        $record = InstructorAttendance::where('instructor_id', $user->id)->whereDate('date', $today)->first();

        if (! $record) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have not checked in today. Please check in first.',
                ], 422);
            }

            return back()->with('error', 'You have not checked in today. Please check in first.');
        }

        if ($record->check_out_time) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already checked out at ' . $record->check_out_time->format('g:i A') . '.',
                ], 422);
            }

            return back()->with('error', 'You have already checked out at ' . $record->check_out_time->format('g:i A') . '.');
        }

        $record->update(['check_out_time' => now()]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Checked out successfully.',
                'check_out_time' => now()->toIso8601String(),
                'worked_minutes' => $record->fresh()->worked_minutes,
            ]);
        }

        return back()->with('success', 'Checked out successfully.');
    }
}
