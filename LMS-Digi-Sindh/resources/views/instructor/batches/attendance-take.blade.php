@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <a href="{{ route('instructor.batches.attendance.index', $batch) }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>Back to attendance</a>
        <h1 class="h3 mb-1">Mark attendance</h1>
        <p class="mb-0 text-body">{{ $batch->name }} — {{ $sessionDate->format('l, M d, Y') }}</p>
    </div>

    @if($enrollments->isEmpty())
        <div class="alert alert-info">No students enrolled in this batch yet.</div>
    @else
        <div class="card border rounded-3">
            <div class="card-body p-4">
                <form method="post" action="{{ route('instructor.batches.attendance.store', $batch) }}">
                    @csrf
                    <input type="hidden" name="date" value="{{ $sessionDate->format('Y-m-d') }}">
                    <div class="mb-4">
                        <label class="form-label">Session mode</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input type="radio" name="mode" id="mode_physical" value="Physical" class="form-check-input" {{ ($existing->first()?->mode ?? 'Physical') === 'Physical' ? 'checked' : '' }}>
                                <label for="mode_physical" class="form-check-label">Physical (offline)</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="mode" id="mode_online" value="Online" class="form-check-input" {{ ($existing->first()?->mode ?? '') === 'Online' ? 'checked' : '' }}>
                                <label for="mode_online" class="form-check-label">Online</label>
                            </div>
                        </div>
                    </div>
                    <p class="small text-body-secondary mb-3">Default is Present. Click <strong>A</strong> for absent, <strong>Lv</strong> for leave, <strong>Late</strong> for late.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0 attendance-grid">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-nowrap">Roll No.</th>
                                    <th>Student name</th>
                                    <th class="text-center" style="width:1%"><span class="d-inline-block px-2 py-1 rounded bg-success text-white" title="Present">P</span></th>
                                    <th class="text-center" style="width:1%"><span class="d-inline-block px-2 py-1 rounded bg-danger text-white" title="Absent">A</span></th>
                                    <th class="text-center" style="width:1%"><span class="d-inline-block px-2 py-1 rounded bg-warning text-dark" title="Leave">Lv</span></th>
                                    <th class="text-center" style="width:1%"><span class="d-inline-block px-2 py-1 rounded bg-secondary text-white" title="Late">Late</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollments as $index => $enrollment)
                                @php
                                    $student = $enrollment->user;
                                    $rec = $existing->get($student->id);
                                    $current = $rec?->status ?? 'Present';
                                @endphp
                                <tr>
                                    <td class="text-center fw-medium">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="fw-medium">{{ $student->name ?? $student->email }}</span>
                                        <small class="d-block text-body">{{ $student->email }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-inline d-inline-block mb-0">
                                            <input type="radio" name="attendance[{{ $student->id }}]" value="Present" id="p-{{ $student->id }}" class="form-check-input" {{ $current === 'Present' ? 'checked' : '' }}>
                                            <label class="form-check-label visually-hidden" for="p-{{ $student->id }}">P</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-inline d-inline-block mb-0">
                                            <input type="radio" name="attendance[{{ $student->id }}]" value="Absent" id="a-{{ $student->id }}" class="form-check-input" {{ $current === 'Absent' ? 'checked' : '' }}>
                                            <label class="form-check-label visually-hidden" for="a-{{ $student->id }}">A</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-inline d-inline-block mb-0">
                                            <input type="radio" name="attendance[{{ $student->id }}]" value="Leave" id="lv-{{ $student->id }}" class="form-check-input" {{ $current === 'Leave' ? 'checked' : '' }}>
                                            <label class="form-check-label visually-hidden" for="lv-{{ $student->id }}">Lv</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-inline d-inline-block mb-0">
                                            <input type="radio" name="attendance[{{ $student->id }}]" value="Late" id="late-{{ $student->id }}" class="form-check-input" {{ $current === 'Late' ? 'checked' : '' }}>
                                            <label class="form-check-label visually-hidden" for="late-{{ $student->id }}">Late</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save attendance</button>
                        <a href="{{ route('instructor.batches.attendance.index', $batch) }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
