<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Fee Management Dashboard: 4 sections.
 * A: Quick Stats (KPIs)  B: Enrollment Requests  C: Fee Vouchers  D: Quick actions.
 */
class FeeManagementController extends Controller
{
    public function index(Request $request): View
    {
        $currency = Setting::get('currency', 'PKR');
        $today = Carbon::today();
        $thisMonthStart = $today->copy()->startOfMonth();
        $defaulterCutoff = $today->copy()->subDays(10);

        // Section A: KPIs
        $totalRevenueThisMonth = (float) Payment::where('paid_at', '>=', $thisMonthStart)->sum('amount');
        $pendingApprovalsCount = Enrollment::where('enrollment_status', 'pending_approval')->count();
        $unverifiedPaymentsCount = Invoice::whereNotNull('proof_image_path')
            ->whereRaw('(amount - COALESCE(discount_amount,0) - amount_paid) > 0')
            ->count();
        $defaultersCount = Invoice::where('due_date', '<', $defaulterCutoff)
            ->whereRaw('(amount - COALESCE(discount_amount,0) - amount_paid) > 0')
            ->count();

        // Section B: Enrollment Requests (filter: New | Approved | Rejected)
        $enrollmentFilter = $request->get('enrollment_filter', 'New');
        $enrollmentsQuery = Enrollment::with(['user.userDetail', 'course', 'batch'])->latest('created_at');
        if ($enrollmentFilter === 'New') {
            $enrollmentsQuery->where('enrollment_status', 'pending_approval');
        } elseif ($enrollmentFilter === 'Approved') {
            $enrollmentsQuery->where('enrollment_status', 'active');
        } elseif ($enrollmentFilter === 'Rejected') {
            $enrollmentsQuery->where('enrollment_status', 'rejected');
        }
        $enrollments = $enrollmentsQuery->paginate(15, ['*'], 'enrollment_page')->withQueryString();

        // Section C: Fee Vouchers (filter: Unpaid | Verification Pending | Paid)
        $voucherFilter = $request->get('voucher_filter', 'Unpaid');
        $vouchersQuery = Invoice::whereNotNull('billing_month')
            ->with(['user.userDetail', 'enrollment.course'])
            ->latest('created_at');
        if ($voucherFilter === 'Unpaid') {
            $vouchersQuery->whereIn('status', ['pending', 'partial', 'overdue'])
                ->whereRaw('(amount - COALESCE(discount_amount,0) - amount_paid) > 0')
                ->whereNull('proof_image_path');
        } elseif ($voucherFilter === 'Verification Pending') {
            $vouchersQuery->whereNotNull('proof_image_path')
                ->whereRaw('(amount - COALESCE(discount_amount,0) - amount_paid) > 0');
        } else {
            $vouchersQuery->whereRaw('amount_paid >= (amount - COALESCE(discount_amount,0))');
        }
        $vouchers = $vouchersQuery->paginate(15, ['*'], 'voucher_page')->withQueryString();

        return view('admin.fee-management.index', compact(
            'currency',
            'totalRevenueThisMonth',
            'pendingApprovalsCount',
            'unverifiedPaymentsCount',
            'defaultersCount',
            'enrollmentFilter',
            'enrollments',
            'voucherFilter',
            'vouchers'
        ));
    }
}
