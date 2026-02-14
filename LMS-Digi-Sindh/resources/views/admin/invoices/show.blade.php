@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Invoice {{ $invoice->invoice_no }}</h1>
        <a href="{{ route('admin.invoices.index') }}" class="btn btn-sm btn-outline-secondary mb-0">Back to list</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header border-bottom p-4">
                <h5 class="mb-0">Details</h5>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif
                <table class="table table-borderless mb-0">
                    <tr><th width="140">Student</th><td>{{ $invoice->user?->name ?? '—' }} ({{ $invoice->user?->email ?? '—' }})</td></tr>
                    <tr><th>Course</th><td>{{ $invoice->enrollment?->course?->name ?? '—' }}</td></tr>
                    <tr><th>Amount</th><td>Rs {{ number_format($invoice->amount, 0) }}</td></tr>
                    <tr><th>Amount paid</th><td>Rs {{ number_format($invoice->amount_paid, 0) }}</td></tr>
                    <tr><th>Balance</th><td class="fw-bold">Rs {{ number_format($invoice->balance, 0) }}</td></tr>
                    <tr><th>Due date</th><td>{{ $invoice->due_date?->format('M j, Y') ?? '—' }}</td></tr>
                    <tr><th>Status</th>
                        <td>@if($invoice->status === 'paid')
                            <span class="badge bg-success">Paid</span>
                        @elseif($invoice->status === 'partial')
                            <span class="badge bg-warning">Partial</span>
                        @else
                            <span class="badge bg-secondary">Pending</span>
                        @endif</td>
                    </tr>
                    @if($invoice->description)
                        <tr><th>Description</th><td>{{ $invoice->description }}</td></tr>
                    @endif
                </table>
            </div>
        </div>

        @if($invoice->balance > 0)
        <div class="card shadow mb-4">
            <div class="card-header border-bottom p-4">
                <h5 class="mb-0">Record payment</h5>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 list-unstyled small">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                <form method="post" action="{{ route('admin.invoices.record-payment', $invoice) }}">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Amount (Rs) * <small class="text-muted">Max: {{ number_format($invoice->balance, 0) }}</small></label>
                            <input type="number" name="amount" id="amount" class="form-control" min="0.01" max="{{ $invoice->balance }}" step="0.01" required>
                        </div>
                        <div class="col-md-6">
                            <label for="paid_at" class="form-label">Paid date *</label>
                            <input type="date" name="paid_at" id="paid_at" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="payment_method_id" class="form-label">Payment method</label>
                            <select name="payment_method_id" id="payment_method_id" class="form-select">
                                <option value="">— Select —</option>
                                @foreach($paymentMethods ?? [] as $pm)
                                    <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="method_note" class="form-label">Method note (e.g. Cash, Online)</label>
                            <input type="text" name="method_note" id="method_note" class="form-control" value="Cash" maxlength="100">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reference" class="form-label">Reference (optional)</label>
                        <input type="text" name="reference" id="reference" class="form-control" maxlength="100">
                    </div>
                    <button type="submit" class="btn btn-success">Record payment</button>
                </form>
            </div>
        </div>
        @endif

        <div class="card shadow">
            <div class="card-header border-bottom p-4">
                <h5 class="mb-0">Payment history</h5>
            </div>
            <div class="card-body p-0">
                @if($invoice->payments->isEmpty())
                    <p class="mb-0 p-4 text-body">No payments recorded.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Reference</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->payments as $p)
                                    <tr>
                                        <td>{{ $p->paid_at?->format('M j, Y H:i') ?? '—' }}</td>
                                        <td>Rs {{ number_format($p->amount, 0) }}</td>
                                        <td>{{ $p->method_note ?? $p->paymentMethod?->name ?? '—' }}</td>
                                        <td>{{ $p->reference ?? '—' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
