@extends('layouts.super-admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1 class="h3 mb-2 mb-sm-0">Global Settings</h1>
        <p class="mb-0 text-body">Academic year, currency, institute name, and logo.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow">
    <div class="card-body p-4">
        <form method="post" action="{{ route('super-admin.settings.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="academic_year" class="form-label">Academic Year</label>
                    <input type="text" name="academic_year" id="academic_year" class="form-control" value="{{ \App\Models\Setting::get('academic_year') }}" placeholder="e.g. 2024-2025">
                </div>
                <div class="col-md-6">
                    <label for="currency" class="form-label">Currency</label>
                    <input type="text" name="currency" id="currency" class="form-control" value="{{ \App\Models\Setting::get('currency', 'PKR') }}" maxlength="10">
                </div>
                <div class="col-12">
                    <label for="institute_name" class="form-label">Institute Name</label>
                    <input type="text" name="institute_name" id="institute_name" class="form-control" value="{{ \App\Models\Setting::get('institute_name') }}" maxlength="255" placeholder="e.g. Digital Sindh Institute">
                </div>
                <div class="col-12">
                    <label for="logo" class="form-label">Logo</label>
                    @php $logoPath = \App\Models\Setting::get('logo'); @endphp
                    @if($logoPath && \Illuminate\Support\Facades\Storage::disk('public')->exists($logoPath))
                        <div class="mb-2"><img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" style="max-height:60px;"></div>
                    @endif
                    <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <label for="attendance_allowed_ips" class="form-label">Instructor check-in allowed IPs (geo-fencing)</label>
                    <input type="text" name="attendance_allowed_ips" id="attendance_allowed_ips" class="form-control" value="{{ \App\Models\Setting::get('attendance_allowed_ips') }}" placeholder="e.g. 192.168.1.1, 10.0.0.0/24 or leave empty to allow any IP">
                    <small class="text-body-secondary">Comma-separated IPs or CIDR. Empty = allow any IP (no restriction).</small>
                </div>
                <div class="col-12 border-top pt-3 mt-2">
                    <h6 class="mb-2">Student QR attendance – GPS (optional)</h6>
                    <p class="small text-body-secondary mb-2">If set, students must be within this radius to mark attendance via QR. Leave empty to skip location check.</p>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label for="attendance_geo_lat" class="form-label small">Latitude</label>
                            <input type="text" name="attendance_geo_lat" id="attendance_geo_lat" class="form-control" value="{{ \App\Models\Setting::get('attendance_geo_lat') }}" placeholder="e.g. 24.8607">
                        </div>
                        <div class="col-md-4">
                            <label for="attendance_geo_lng" class="form-label small">Longitude</label>
                            <input type="text" name="attendance_geo_lng" id="attendance_geo_lng" class="form-control" value="{{ \App\Models\Setting::get('attendance_geo_lng') }}" placeholder="e.g. 67.0011">
                        </div>
                        <div class="col-md-4">
                            <label for="attendance_geo_radius_meters" class="form-label small">Radius (meters)</label>
                            <input type="number" name="attendance_geo_radius_meters" id="attendance_geo_radius_meters" class="form-control" value="{{ \App\Models\Setting::get('attendance_geo_radius_meters') }}" placeholder="100" min="0" step="10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection
