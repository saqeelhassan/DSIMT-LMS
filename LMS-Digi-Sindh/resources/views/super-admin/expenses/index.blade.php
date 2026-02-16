@extends('layouts.super-admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-2 mb-sm-0">Expenses</h1>
            <p class="mb-0 text-body">Salaries, lab maintenance, server costs.</p>
        </div>
        <a href="{{ route('super-admin.expenses.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Record Expense</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form class="mb-3" method="get">
    <div class="row g-2">
        <div class="col-md-3">
            <select name="type" class="form-select" onchange="this.form.submit()">
                <option value="">All types</option>
                <option value="salary" {{ request('type') === 'salary' ? 'selected' : '' }}>Salary</option>
                <option value="lab_maintenance" {{ request('type') === 'lab_maintenance' ? 'selected' : '' }}>Lab Maintenance</option>
                <option value="server" {{ request('type') === 'server' ? 'selected' : '' }}>Server</option>
                <option value="other" {{ request('type') === 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="branch" class="form-select" onchange="this.form.submit()">
                <option value="">All branches</option>
                @foreach($branches as $b)
                    <option value="{{ $b->id }}" {{ request('branch') == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>

<div class="card shadow">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Branch</th>
                        <th>Amount</th>
                        <th>Recorded By</th>
                        @if(auth()->user()->role?->name === 'SuperAdmin')
                        <th class="text-end">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $e)
                    <tr>
                        <td>{{ $e->expense_date->format('M d, Y') }}</td>
                        <td><span class="badge bg-secondary">{{ str_replace('_', ' ', ucfirst($e->type)) }}</span></td>
                        <td>{{ $e->payee_name ?? '—' }}</td>
                        <td>{{ Str::limit($e->description ?? '—', 40) }}</td>
                        <td>{{ $e->branch?->name ?? '—' }}</td>
                        <td><strong>{{ number_format($e->amount) }} {{ \App\Models\Setting::get('currency', 'PKR') }}</strong></td>
                        <td>{{ $e->recorder?->name ?? '—' }}</td>
                        @if(auth()->user()->role?->name === 'SuperAdmin')
                        <td class="text-end">
                            <a href="{{ route('super-admin.expenses.edit', $e) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="post" action="{{ route('super-admin.expenses.destroy', $e) }}" class="d-inline" onsubmit="return confirm('Delete this expense?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr><td colspan="{{ auth()->user()->role?->name === 'SuperAdmin' ? 8 : 7 }}" class="text-center py-4 text-body">No expenses recorded. <a href="{{ route('super-admin.expenses.create') }}">Record one</a>.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($expenses->hasPages())
        <div class="card-footer">{{ $expenses->links() }}</div>
    @endif
</div>
@endsection
