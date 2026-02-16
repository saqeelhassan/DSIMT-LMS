@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <a href="{{ route('instructor.batches.attendance.index', $batch) }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>Back to attendance</a>
        <h1 class="h3 mb-1">Attendance view</h1>
        <p class="mb-0 text-body">{{ $batch->name }} — {{ $sessionDate->format('l, M d, Y') }}</p>
    </div>

    <div class="card border rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Status</th>
                            <th>Mode</th>
                            <th>Marked by</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $a)
                        <tr>
                            <td>
                                <div>
                                    <h6 class="mb-0">{{ $a->student->name ?? $a->student->email }}</h6>
                                    <small class="text-body">{{ $a->student->email }}</small>
                                </div>
                            </td>
                            <td><span class="badge bg-{{ $a->status === 'Present' ? 'success' : ($a->status === 'Absent' ? 'danger' : 'warning') }}">{{ $a->status }}</span></td>
                            <td>{{ $a->mode }}</td>
                            <td>{{ $a->markedByUser->name ?? 'System' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-body py-4">No attendance recorded for this date.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
