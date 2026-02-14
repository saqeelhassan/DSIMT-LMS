@extends('layouts.super-admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('super-admin.expenses.index') }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>Back to expenses</a>
        <h1 class="h3 mb-2 mb-sm-0">Record Expense</h1>
    </div>
</div>

<div class="card shadow">
    <div class="card-body p-4">
        <form method="post" action="{{ route('super-admin.expenses.store') }}">
            @csrf
            <div class="mb-3">
                <label for="type" class="form-label">Type *</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">— Select —</option>
                    <option value="salary" {{ old('type') === 'salary' ? 'selected' : '' }}>Salary</option>
                    <option value="lab_maintenance" {{ old('type') === 'lab_maintenance' ? 'selected' : '' }}>Lab Maintenance</option>
                    <option value="server" {{ old('type') === 'server' ? 'selected' : '' }}>Server</option>
                    <option value="other" {{ old('type') === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" maxlength="500">
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="amount" class="form-label">Amount *</label>
                    <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount') }}" step="0.01" min="0" required>
                </div>
                <div class="col-md-6">
                    <label for="expense_date" class="form-label">Date *</label>
                    <input type="date" name="expense_date" id="expense_date" class="form-control" value="{{ old('expense_date', date('Y-m-d')) }}" required>
                </div>
            </div>
            <div class="mb-4 mt-3">
                <label for="branch_id" class="form-label">Branch (optional)</label>
                <select name="branch_id" id="branch_id" class="form-select">
                    <option value="">— None —</option>
                    @foreach($branches as $b)
                        <option value="{{ $b->id }}" {{ old('branch_id') == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Record Expense</button>
            <a href="{{ route('super-admin.expenses.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
