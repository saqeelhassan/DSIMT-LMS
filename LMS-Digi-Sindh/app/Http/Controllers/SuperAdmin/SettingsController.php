<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        return view('super-admin.settings.index');
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'academic_year' => ['nullable', 'string', 'max:50'],
            'currency' => ['nullable', 'string', 'max:10'],
            'institute_name' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'attendance_allowed_ips' => ['nullable', 'string', 'max:500'],
            'attendance_geo_lat' => ['nullable', 'numeric'],
            'attendance_geo_lng' => ['nullable', 'numeric'],
            'attendance_geo_radius_meters' => ['nullable', 'numeric', 'min:0'],
        ]);

        if (!empty($validated['academic_year'])) {
            Setting::set('academic_year', $validated['academic_year']);
        }
        if (!empty($validated['currency'])) {
            Setting::set('currency', $validated['currency']);
        }
        if (!empty($validated['institute_name'])) {
            Setting::set('institute_name', $validated['institute_name']);
        }
        if (array_key_exists('attendance_allowed_ips', $validated)) {
            Setting::set('attendance_allowed_ips', $validated['attendance_allowed_ips'] ?? '');
        }
        if (array_key_exists('attendance_geo_lat', $validated)) {
            Setting::set('attendance_geo_lat', $validated['attendance_geo_lat'] ?? '');
        }
        if (array_key_exists('attendance_geo_lng', $validated)) {
            Setting::set('attendance_geo_lng', $validated['attendance_geo_lng'] ?? '');
        }
        if (array_key_exists('attendance_geo_radius_meters', $validated)) {
            Setting::set('attendance_geo_radius_meters', $validated['attendance_geo_radius_meters'] ?? '');
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            Setting::set('logo', $path);
        }

        return redirect()->route('super-admin.settings.index')->with('success', 'Settings saved.');
    }
}
