@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <h1 class="h3 mb-1">Fee Status</h1>
        <p class="mb-0 text-body">You receive a <strong>monthly fee voucher</strong> for each enrolled course. Pay each voucher by the due date to continue your classes.</p>
    </div>

    @if($pendingCount > 0)
        <div class="alert alert-warning alert-dismissible fade show">
            You have <strong>{{ $pendingCount }}</strong> unpaid voucher(s). Please pay to continue your classes.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Voucher / Invoice</th>
                            <th>Month</th>
                            <th>Course</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Due date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $inv)
                        <tr>
                            <td>{{ $inv->invoice_no }}</td>
                            <td>{{ $inv->billing_month ? $inv->billing_month->format('M Y') : '—' }}</td>
                            <td>{{ $inv->enrollment->course->name ?? '—' }}</td>
                            <td>{{ number_format($inv->amount, 2) }}</td>
                            <td>{{ number_format($inv->amount_paid, 2) }}</td>
                            <td>{{ $inv->due_date?->format('M d, Y') ?? '—' }}</td>
                            <td>
                                @if($inv->amount_paid >= $inv->amount)
                                    <span class="badge bg-success">Paid</span>
                                @elseif($inv->status === 'overdue')
                                    <span class="badge bg-danger">Overdue</span>
                                @elseif($inv->amount_paid > 0)
                                    <span class="badge bg-info">Partial</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-body">No fee vouchers yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($invoices->hasPages())
                <div class="d-flex justify-content-center mt-3">{{ $invoices->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
