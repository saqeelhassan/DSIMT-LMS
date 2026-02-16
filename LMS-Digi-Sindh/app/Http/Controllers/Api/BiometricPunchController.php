<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BiometricLog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Receives punch data from biometric devices (ZKTeco/Hikvision).
 * Stores raw log only. Punch logic (check-in/check-out, late, ghost) is applied
 * by a separate process (e.g. BiometricPunchProcessor or scheduled command).
 */
class BiometricPunchController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'machine_user_id' => ['required', 'string', 'max:50'],
            'device_id' => ['nullable', 'string', 'max:100'],
            'scan_time' => ['required', 'date'],
            'type' => ['nullable', 'string', 'in:Fingerprint,Face,Card'],
        ]);

        $userId = $this->resolveUserId($validated['machine_user_id']);

        BiometricLog::create([
            'user_id' => $userId,
            'machine_user_id' => $validated['machine_user_id'],
            'device_id' => $validated['device_id'] ?? null,
            'scan_time' => $validated['scan_time'],
            'type' => $validated['type'] ?? BiometricLog::TYPE_FINGERPRINT,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Punch recorded.',
            'user_id' => $userId,
        ]);
    }

    /**
     * Resolve device's system ID (e.g. 1005) to LMS user_id.
     * user_details.biometric_id is set when registering the user on the device.
     */
    private function resolveUserId(string $machineUserId): ?int
    {
        $normalized = trim($machineUserId);
        $user = User::whereHas('userDetail', fn ($q) => $q->where('biometric_id', $normalized))->first();

        return $user?->id;
    }
}
