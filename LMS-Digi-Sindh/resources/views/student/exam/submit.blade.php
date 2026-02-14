@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <a href="{{ route('student.exams.index') }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>Back to exams</a>
        <h1 class="h3 mb-1">{{ $exam->title }}</h1>
        <p class="mb-0 text-body">{{ $exam->course->name ?? '—' }} — Total: {{ $exam->total_marks }} marks</p>
    </div>

    @if($exam->description)
        <div class="card border rounded-3 mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Instructions</h5>
            </div>
            <div class="card-body">
                <div style="white-space: pre-wrap;">{{ $exam->description }}</div>
            </div>
        </div>
    @endif

    @if($submission->status === 'marked')
        <div class="card border rounded-3 mb-4 border-success">
            <div class="card-header bg-success bg-opacity-10">
                <h5 class="mb-0 text-success">Result: {{ $submission->marks_obtained }}/{{ $exam->total_marks }}</h5>
            </div>
            <div class="card-body">
                @if($submission->feedback)
                    <p class="mb-0"><strong>Feedback:</strong><br>{{ $submission->feedback }}</p>
                @endif
                <p class="mb-0 mt-2 small text-body">Marked on {{ $submission->marked_at?->format('M d, Y H:i') }}</p>
            </div>
        </div>
    @endif

    @if($submission->status !== 'marked')
        <div class="card border rounded-3">
            <div class="card-body p-4">
                <form method="post" action="{{ route('student.exams.submit', $exam) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="answer_content" class="form-label">Your answer *</label>
                        <textarea name="answer_content" id="answer_content" class="form-control @error('answer_content') is-invalid @enderror" rows="10" required maxlength="50000">{{ old('answer_content', $submission->answer_content) }}</textarea>
                        @error('answer_content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">{{ $submission->status === 'submitted' ? 'Update submission' : 'Submit exam' }}</button>
                        <a href="{{ route('student.exams.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
