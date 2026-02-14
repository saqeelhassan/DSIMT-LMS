@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1 class="h3 mb-2 mb-sm-0">Create Invoice</h1>
        <p class="mb-0 text-body">Generate a fee challan for a student.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 list-unstyled small">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('admin.invoices.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Student *</label>
                        <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                            <option value="">Select student</option>
                            @foreach($students as $s)
                                <option value="{{ $s->id }}" {{ (int) old('user_id') === $s->id ? 'selected' : '' }}>{{ $s->name }} ({{ $s->email }})</option>
                            @endforeach
                        </select>
                        @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="enrollment_id" class="form-label">Enrollment (optional)</label>
                        <select name="enrollment_id" id="enrollment_id" class="form-select @error('enrollment_id') is-invalid @enderror">
                            <option value="">No enrollment</option>
                            @foreach($enrollments as $e)
                                <option value="{{ $e->id }}" {{ (int) old('enrollment_id') === $e->id ? 'selected' : '' }}>{{ $e->user?->name ?? '-' }} - {{ $e->course?->name ?? '-' }}</option>
                            @endforeach
                        </select>
                        @error('enrollment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Amount (Rs) *</label>
                            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror"
                                value="{{ old('amount') }}" min="0" step="0.01" required>
                            @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="due_date" class="form-label">Due date *</label>
                            <input type="date" name="due_date" id="due_date" class="form-control @error('due_date') is-invalid @enderror"
                                value="{{ old('due_date') }}" required>
                            @error('due_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label">Description (optional)</label>
                        <textarea name="description" id="description" class="form-control" rows="2" maxlength="500">{{ old('description') }}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Create invoice</button>
                        <a href="{{ route('admin.invoices.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
