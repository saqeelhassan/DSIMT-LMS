@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h3 mb-2 mb-sm-0">Invoices &amp; Fee Vouchers</h1>
        <div class="d-flex gap-2">
            <form method="post" action="{{ route('admin.invoices.generate-vouchers') }}" class="d-inline" onsubmit="return confirm('Generate monthly fee vouchers for this month for all active enrollments with a monthly fee?');">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary mb-0">Generate monthly vouchers</button>
            </form>
            <a href="{{ route('admin.invoices.create') }}" class="btn btn-sm btn-primary mb-0">Create Invoice</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-bottom p-4">
                <form method="get" action="{{ route('admin.invoices.index') }}" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All statuses</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="partial" {{ request('status') === 'partial' ? 'selected' : '' }}>Partial</option>
                            <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="overdue" {{ request('status') === 'overdue' ? 'selected' : '' }}>Overdue</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success mb-0 rounded-0 border-0 border-bottom">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice #</th>
                                <th>Month</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Due date</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $inv)
                                <tr>
                                    <td>{{ $inv->invoice_no }}</td>
                                    <td>{{ $inv->billing_month ? $inv->billing_month->format('M Y') : '—' }}</td>
                                    <td>{{ $inv->user?->name ?? '—' }}</td>
                                    <td>{{ $inv->enrollment?->course?->name ?? '—' }}</td>
                                    <td>Rs {{ number_format($inv->amount, 0) }}</td>
                                    <td>Rs {{ number_format($inv->amount_paid, 0) }}</td>
                                    <td>{{ $inv->due_date?->format('M j, Y') ?? '—' }}</td>
                                    <td>
                                        @if($inv->status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif($inv->status === 'partial')
                                            <span class="badge bg-warning">Partial</span>
                                        @elseif($inv->status === 'overdue')
                                            <span class="badge bg-danger">Overdue</span>
                                        @else
                                            <span class="badge bg-secondary">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.invoices.show', $inv) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="9" class="text-center py-4 text-body">No invoices yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($invoices->hasPages())
                    <div class="card-footer border-top py-2">
                        {{ $invoices->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
