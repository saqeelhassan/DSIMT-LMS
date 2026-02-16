@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <h1 class="h3 mb-1">My exams</h1>
        <p class="mb-0 text-body">Exams for your enrolled courses.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show">{{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Course / Batch</th>
                            <th>Total marks</th>
                            <th>Due date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($exams as $exam)
                        @php $mySub = $exam->submissions->first(); @endphp
                        <tr>
                            <td>
                                <h6 class="mb-0">{{ $exam->title }}</h6>
                                @if($exam->description)<small class="text-body">{{ Str::limit($exam->description, 50) }}</small>@endif
                            </td>
                            <td>{{ $exam->course->name ?? '—' }}@if($exam->batch) <span class="text-muted">({{ $exam->batch->name }})</span>@endif</td>
                            <td>{{ $exam->isMcq() ? $exam->total_marks_from_questions : $exam->total_marks }}</td>
                            <td>{{ $exam->due_date?->format('M d, Y') ?? '—' }}</td>
                            <td>
                                @if($mySub && $mySub->status === 'marked')
                                    <span class="badge bg-success">Marked ({{ $mySub->marks_obtained }}/{{ $exam->isMcq() ? $exam->total_marks_from_questions : $exam->total_marks }})</span>
                                @elseif($mySub && $mySub->status === 'submitted')
                                    <span class="badge bg-info">Pending</span>
                                @else
                                    <span class="badge bg-secondary">Not submitted</span>
                                @endif
                            </td>
                            <td>
                                @if(!$mySub || $mySub->status !== 'marked')
                                    <a href="{{ route('student.exams.submit-form', $exam) }}" class="btn btn-sm btn-outline-primary">{{ $mySub && $mySub->status === 'submitted' ? 'View' : 'Submit' }}</a>
                                @else
                                    <a href="{{ route('student.exams.submit-form', $exam) }}" class="btn btn-sm btn-outline-secondary">View result</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-body">No exams yet for your enrolled courses.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($exams->hasPages())
                <div class="d-flex justify-content-center mt-3">{{ $exams->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
