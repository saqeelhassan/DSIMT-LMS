@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1 class="h3 mb-2 mb-sm-0">Add Batch</h1>
        <p class="mb-0 text-body">Create a new batch (Morning, Evening, Weekend, etc.).</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 list-unstyled small">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                <form method="post" action="{{ route('admin.batches.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course *</label>
                        <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                            <option value="">— Select course —</option>
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}" {{ (int) old('course_id') === $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('course_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Batch name *</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="e.g. Morning Batch, Evening Batch" required maxlength="255">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="instructor_id" class="form-label">Instructor</label>
                            <select name="instructor_id" id="instructor_id" class="form-select @error('instructor_id') is-invalid @enderror">
                                <option value="">— No instructor —</option>
                                @foreach($instructors as $i)
                                    <option value="{{ $i->id }}" {{ (int) old('instructor_id') === $i->id ? 'selected' : '' }}>{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-select @error('branch_id') is-invalid @enderror">
                                <option value="">— No branch —</option>
                                @foreach($branches as $b)
                                    <option value="{{ $b->id }}" {{ (int) old('branch_id') === $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="schedule_note" class="form-label">Schedule note</label>
                        <input type="text" name="schedule_note" id="schedule_note" class="form-control" value="{{ old('schedule_note') }}"
                            placeholder="e.g. Mon–Fri 10 AM–12 PM">
                    </div>
                    <div class="mb-4">
                        <label for="monthly_fee" class="form-label">Monthly fee (PKR)</label>
                        <input type="number" name="monthly_fee" id="monthly_fee" class="form-control" step="0.01" min="0" placeholder="Optional"
                            value="{{ old('monthly_fee') }}">
                        <small class="text-muted">Students in this batch get a monthly fee voucher for this amount.</small>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Create batch</button>
                        <a href="{{ route('admin.batches.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
