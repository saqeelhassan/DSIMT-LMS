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

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            Setting::set('logo', $path);
        }

        return redirect()->route('super-admin.settings.index')->with('success', 'Settings saved.');
    }
}
