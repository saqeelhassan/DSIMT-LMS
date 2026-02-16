<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Setting;
use App\Models\StudentAttendance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class QrAttendanceController extends Controller
{
    /**
     * Show QR attendance page (signed URL). Student must be logged in and enrolled in the batch.
     */
    public function show(Request $request, Batch $batch): View|RedirectResponse
    {
        if (! URL::hasValidSignature($request)) {
            abort(403, 'Invalid or expired QR link.');
        }

        $user = auth()->user();
        $enrolled = $batch->enrollments()->where('user_id', $user->id)->exists();
        if (! $enrolled) {
            abort(403, 'You are not enrolled in this batch.');
        }

        session(['qr_attendance_batch_id' => $batch->id]);

        return view('student.attendance.qr', compact('batch'));
    }

    /**
     * Mark present via QR (Physical). Optional GPS validation if institute location is set.
     */
    public function mark(Request $request): RedirectResponse|\Illuminate\Http\JsonResponse
    {
        $batchId = session('qr_attendance_batch_id');
        if (! $batchId) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Invalid session. Please scan the QR code again.'], 400);
            }
            return redirect()->route('student.dashboard')->with('error', 'Invalid session. Please scan the QR code again.');
        }

        $batch = Batch::find($batchId);
        if (! $batch) {
            session()->forget('qr_attendance_batch_id');
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Batch not found.'], 404);
            }
            return redirect()->route('student.dashboard')->with('error', 'Batch not found.');
        }

        $user = auth()->user();
        if (! $batch->enrollments()->where('user_id', $user->id)->exists()) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'You are not enrolled in this batch.'], 403);
            }
            return redirect()->route('student.dashboard')->with('error', 'You are not enrolled in this batch.');
        }

        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $lat = is_numeric($lat) ? (float) $lat : null;
        $lng = is_numeric($lng) ? (float) $lng : null;

        $geoLat = Setting::get('attendance_geo_lat');
        $geoLng = Setting::get('attendance_geo_lng');
        $geoRadius = Setting::get('attendance_geo_radius_meters');
        if ($geoLat !== null && $geoLat !== '' && $geoLng !== null && $geoLng !== '' && $geoRadius !== null && $geoRadius !== '') {
            $centerLat = (float) $geoLat;
            $centerLng = (float) $geoLng;
            $radiusM = (float) $geoRadius;
            if ($lat === null || $lng === null) {
                if ($request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => 'Location is required to mark attendance at the institute.'], 422);
                }
                return back()->with('error', 'Please allow location access to mark attendance.');
            }
            $distanceM = $this->haversineDistance($centerLat, $centerLng, $lat, $lng);
            if ($distanceM > $radiusM) {
                if ($request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => 'You must be within the institute premises to mark attendance.'], 422);
                }
                return back()->with('error', 'You must be within the institute premises to mark attendance.');
            }
        }

        $today = now()->toDateString();
        StudentAttendance::updateOrCreate(
            [
                'student_id' => $user->id,
                'batch_id' => $batch->id,
                'date' => $today,
            ],
            [
                'status' => StudentAttendance::STATUS_PRESENT,
                'mode' => StudentAttendance::MODE_PHYSICAL,
                'marked_by' => null,
            ]
        );

        session()->forget('qr_attendance_batch_id');

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Attendance marked successfully.']);
        }
        return back()->with('success', 'Attendance marked successfully.');
    }

    private function haversineDistance(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $earthRadius = 6371000; // meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) ** 2 + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
