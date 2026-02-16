@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-2 mb-sm-0">Fee Management Dashboard</h1>
        <p class="mb-0 text-body">Central command center: KPIs, enrollment requests, fee vouchers, and discounts.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif
@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show">{{ session('info') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<!-- Section A: Quick Stats (KPIs) -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-body small mb-1">Total Revenue (This Month)</h6>
                <h3 class="mb-0 fw-bold text-success">{{ $currency }} {{ number_format($totalRevenueThisMonth, 0) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('admin.fee-management.index', ['enrollment_filter' => 'New']) }}" class="text-decoration-none text-body">
            <div class="card border-0 shadow-sm h-100 {{ $pendingApprovalsCount > 0 ? 'border-warning' : '' }}">
                <div class="card-body">
                    <h6 class="text-body small mb-1">Pending Approvals</h6>
                    <h3 class="mb-0 fw-bold">{{ $pendingApprovalsCount }} <span class="small fw-normal">Students</span></h3>
                    <span class="small text-body">Waiting for enrollment acceptance</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('admin.fee-management.index', ['voucher_filter' => 'Verification Pending']) }}" class="text-decoration-none text-body">
            <div class="card border-0 shadow-sm h-100 {{ $unverifiedPaymentsCount > 0 ? 'border-info' : '' }}">
                <div class="card-body">
                    <h6 class="text-body small mb-1">Unverified Payments</h6>
                    <h3 class="mb-0 fw-bold">{{ $unverifiedPaymentsCount }} <span class="small fw-normal">Receipts</span></h3>
                    <span class="small text-body">Uploaded by students, waiting for admin check</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('admin.defaulters.index') }}" class="text-decoration-none text-body">
            <div class="card border-0 shadow-sm h-100 {{ $defaultersCount > 0 ? 'border-danger' : '' }}">
                <div class="card-body">
                    <h6 class="text-body small mb-1">Defaulters</h6>
                    <h3 class="mb-0 fw-bold">{{ $defaultersCount }} <span class="small fw-normal">Students</span></h3>
                    <span class="small text-body">Late on payments &gt; 10 days</span>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Section B: Enrollment Requests -->
<div class="card shadow mb-4">
    <div class="card-header border-bottom d-flex flex-wrap align-items-center gap-2">
        <h5 class="mb-0">Enrollment Requests</h5>
        <div class="btn-group btn-group-sm ms-auto">
            <a href="{{ route('admin.fee-management.index', array_merge(request()->query(), ['enrollment_filter' => 'New'])) }}" class="btn btn-{{ $enrollmentFilter === 'New' ? 'warning' : 'outline-secondary' }}">New</a>
            <a href="{{ route('admin.fee-management.index', array_merge(request()->query(), ['enrollment_filter' => 'Approved'])) }}" class="btn btn-{{ $enrollmentFilter === 'Approved' ? 'success' : 'outline-secondary' }}">Approved</a>
            <a href="{{ route('admin.fee-management.index', array_merge(request()->query(), ['enrollment_filter' => 'Rejected'])) }}" class="btn btn-{{ $enrollmentFilter === 'Rejected' ? 'danger' : 'outline-secondary' }}">Rejected</a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Request Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $e)
                    <tr>
                        <td>{{ $e->user->name ?? $e->user->email }}</td>
                        <td>{{ $e->course?->name ?? '—' }} @if($e->batch)({{ $e->batch->name }})@endif</td>
                        <td>{{ $e->created_at?->format('M d, Y') }}</td>
                        <td class="text-end">
                            @if($e->enrollment_status === 'pending_approval')
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveModal" data-enrollment-id="{{ $e->id }}" data-student-name="{{ $e->user->name ?? $e->user->email }}">Approve</button>
                                <form method="post" action="{{ route('admin.enrollments.reject', $e) }}" class="d-inline" onsubmit="return confirm('Reject this enrollment?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Reject</button>
                                </form>
                            @else
                                <span class="badge bg-{{ $e->enrollment_status === 'active' ? 'success' : ($e->enrollment_status === 'rejected' ? 'danger' : 'secondary') }}">{{ $e->enrollment_status }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-4 text-body">No enrollments in this filter.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($enrollments->hasPages())
            <div class="card-footer border-top py-2">{{ $enrollments->withQueryString()->links() }}</div>
        @endif
    </div>
</div>

<!-- Approve modal with discount -->
<div class="modal fade" id="approveModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="approveForm" action="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Approve enrollment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Approve enrollment for <strong id="approveStudentName"></strong>?</p>
                    <div class="mb-3">
                        <label class="form-label">Apply permanent scholarship (optional)</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <select name="discount_type" id="approveDiscountType" class="form-select form-select-sm">
                                    <option value="None">None</option>
                                    <option value="Percentage">Percentage off</option>
                                    <option value="Fixed">Flat amount off</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="number" name="discount_value" id="approveDiscountValue" class="form-control form-control-sm" min="0" step="0.01" placeholder="e.g. 10 or 500" style="display:none;">
                            </div>
                        </div>
                        <small class="text-body-secondary">e.g. 10% off or 500 flat. Applied to every future voucher.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Approve & create Voucher #1</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Section C: Fee Vouchers -->
<div class="card shadow mb-4">
    <div class="card-header border-bottom d-flex flex-wrap align-items-center gap-2">
        <h5 class="mb-0">Fee Vouchers</h5>
        <div class="btn-group btn-group-sm ms-auto">
            <a href="{{ route('admin.fee-management.index', array_merge(request()->query(), ['voucher_filter' => 'Unpaid'])) }}" class="btn btn-{{ $voucherFilter === 'Unpaid' ? 'warning' : 'outline-secondary' }}">Unpaid</a>
            <a href="{{ route('admin.fee-management.index', array_merge(request()->query(), ['voucher_filter' => 'Verification Pending'])) }}" class="btn btn-{{ $voucherFilter === 'Verification Pending' ? 'info' : 'outline-secondary' }}">Verification Pending</a>
            <a href="{{ route('admin.fee-management.index', array_merge(request()->query(), ['voucher_filter' => 'Paid'])) }}" class="btn btn-{{ $voucherFilter === 'Paid' ? 'success' : 'outline-secondary' }}">Paid</a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Voucher ID</th>
                        <th>Student</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vouchers as $v)
                    <tr>
                        <td>#{{ $v->invoice_no }}</td>
                        <td>{{ $v->user->name ?? $v->user->email }}</td>
                        <td>{{ $v->billing_month ? $v->billing_month->format('M Y') : '—' }}</td>
                        <td>{{ $currency }} {{ number_format($v->amount, 0) }}</td>
                        <td>{{ number_format($v->discount_amount ?? 0, 0) }}</td>
                        <td>
                            @if($v->amount_paid >= $v->amount_after_discount)
                                <span class="badge bg-success">Paid</span>
                            @elseif($v->proof_image_path)
                                <span class="badge bg-info">Verification Pending</span>
                            @elseif($v->status === 'overdue')
                                <span class="badge bg-danger">Overdue</span>
                            @else
                                <span class="badge bg-warning">Unpaid</span>
                            @endif
                        </td>
                        <td class="text-end">
                            @if($v->proof_image_path)
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#receiptModal" data-receipt-url="{{ asset('storage/' . $v->proof_image_path) }}">View Receipt</button>
                            @endif
                            <a href="{{ route('admin.invoices.show', $v) }}" class="btn btn-sm btn-outline-secondary">{{ $v->proof_image_path ? 'Verify' : 'Record payment' }}</a>
                            @if($v->balance > 0 && !$v->proof_image_path)
                                <form action="{{ route('admin.invoices.remind', $v) }}" method="post" class="d-inline" onsubmit="return confirm('Send fee reminder to {{ $v->user->name ?? 'student' }}?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Send SMS/reminder: Your fee for {{ $v->billing_month?->format('F Y') }} is pending.">Remind</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-4 text-body">No vouchers in this filter.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($vouchers->hasPages())
            <div class="card-footer border-top py-2">{{ $vouchers->withQueryString()->links() }}</div>
        @endif
    </div>
</div>

<!-- Receipt modal -->
<div class="modal fade" id="receiptModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Uploaded receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="receiptImage" src="" alt="Receipt" class="img-fluid rounded" style="max-height:70vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Section D: Quick actions -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h6 class="mb-2">Quick actions</h6>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.enrollments.index') }}" class="btn btn-outline-secondary btn-sm">All Enrollments</a>
            <a href="{{ route('admin.invoices.index') }}" class="btn btn-outline-secondary btn-sm">All Invoices</a>
            <a href="{{ route('admin.invoices.create') }}" class="btn btn-outline-secondary btn-sm">Create invoice</a>
            <form method="post" action="{{ route('admin.invoices.generate-vouchers') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-primary btn-sm">Generate vouchers (current month)</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var approveModal = document.getElementById('approveModal');
    if (approveModal) {
        approveModal.addEventListener('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            var id = btn.getAttribute('data-enrollment-id');
            var name = btn.getAttribute('data-student-name');
            document.getElementById('approveStudentName').textContent = name || 'Student';
            document.getElementById('approveForm').action = '{{ url("admin/enrollments") }}/' + id + '/approve';
        });
    }
    var discountType = document.getElementById('approveDiscountType');
    var discountValue = document.getElementById('approveDiscountValue');
    if (discountType) {
        discountType.addEventListener('change', function() {
            discountValue.style.display = (this.value === 'None') ? 'none' : 'block';
        });
    }
    var receiptModal = document.getElementById('receiptModal');
    if (receiptModal) {
        receiptModal.addEventListener('show.bs.modal', function(e) {
            var url = e.relatedTarget ? e.relatedTarget.getAttribute('data-receipt-url') : '';
            document.getElementById('receiptImage').src = url || '';
        });
    }
});
</script>
@endsection
