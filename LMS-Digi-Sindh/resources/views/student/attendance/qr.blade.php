@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="card border rounded-3">
        <div class="card-body p-4">
            <h5 class="card-title mb-2"><i class="bi bi-qr-code-scan me-2"></i>Mark attendance (QR)</h5>
            <p class="text-body mb-4">Batch: <strong>{{ $batch->name }}</strong>. You are marking yourself <strong>Present</strong> for today (Physical).</p>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }} <a href="{{ route('student.dashboard') }}">Back to dashboard</a></div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(!session('success'))
            <p class="small text-body-secondary mb-2">Allow location access so we can verify you are at the institute (if required by admin).</p>
            <form id="qr-attendance-form" method="post" action="{{ route('student.attendance.qr-mark') }}">
                @csrf
                <input type="hidden" name="lat" id="qr-lat">
                <input type="hidden" name="lng" id="qr-lng">
                <button type="submit" class="btn btn-success btn-lg" id="qr-submit-btn" disabled>
                    <i class="bi bi-check-circle me-2"></i>Mark me Present
                </button>
            </form>
            <p class="small text-muted mt-2 mb-0" id="qr-location-status">Getting location…</p>
            @endif
        </div>
    </div>
</div>

@if(!session('success'))
<script>
(function() {
    var latInput = document.getElementById('qr-lat');
    var lngInput = document.getElementById('qr-lng');
    var btn = document.getElementById('qr-submit-btn');
    var status = document.getElementById('qr-location-status');
    if (!btn) return;
    function enableSubmit() {
        btn.disabled = false;
        status.textContent = 'Location ready. Click the button to mark attendance.';
    }
    function noLocation() {
        if (latInput) latInput.value = '';
        if (lngInput) lngInput.value = '';
        btn.disabled = false;
        status.textContent = 'Location not available. You can still try to mark attendance (admin may have disabled GPS check).';
    }
    if (!navigator.geolocation) { noLocation(); return; }
    navigator.geolocation.getCurrentPosition(
        function(pos) {
            latInput.value = pos.coords.latitude;
            lngInput.value = pos.coords.longitude;
            enableSubmit();
        },
        function() { noLocation(); },
        { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
    );
})();
</script>
@endif
@endsection
