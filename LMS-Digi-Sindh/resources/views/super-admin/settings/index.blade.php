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
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection
