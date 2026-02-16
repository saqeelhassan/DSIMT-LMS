<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Services\FeeVoucherService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of enrollments for the admin dashboard.
     */
    public function index(Request $request): View
    {
        $enrollments = Enrollment::with(['user.userDetail', 'course', 'batch'])
            ->when($request->filled('course'), fn ($q) => $q->where('course_id', $request->course))
            ->when($request->filled('status'), fn ($q) => $q->where('enrollment_status', $request->status))
            ->latest('created_at')
            ->paginate(15)
            ->withQueryString();

        $courses = Course::orderBy('name')->get();

        return view('admin.enrollments.index', compact('enrollments', 'courses'));
    }

    /**
     * Approve a pending enrollment: optional permanent discount, set active, generate Month 1 voucher.
     */
    public function approve(Request $request, Enrollment $enrollment): RedirectResponse
    {
        if ($enrollment->enrollment_status !== 'pending_approval') {
            return redirect()->route('admin.fee-management.index')->with('info', 'Enrollment is not pending approval.');
        }

        $enrollment->enrollment_status = 'active';
        if ($enrollment->monthly_fee === null && $enrollment->batch?->monthly_fee !== null) {
            $enrollment->monthly_fee = $enrollment->batch->monthly_fee;
        }
        $discountType = $request->input('discount_type', 'None');
        $discountValue = $request->input('discount_value');
        if (in_array($discountType, ['Percentage', 'Fixed'], true) && $discountValue !== null && $discountValue !== '') {
            $enrollment->discount_type = $discountType;
            $enrollment->discount_value = $discountValue;
        } else {
            $enrollment->discount_type = 'None';
            $enrollment->discount_value = null;
        }
        if (! $enrollment->start_date) {
            $enrollment->start_date = now()->startOfMonth();
        }
        $enrollment->save();

        $voucherService = app(FeeVoucherService::class);
        $voucher = $voucherService->generateFirstMonthForEnrollment($enrollment);

        $msg = 'Enrollment approved.';
        if ($enrollment->discount_type !== 'None') {
            $msg .= ' Permanent discount applied: ' . $enrollment->discount_type . ' ' . $enrollment->discount_value . '.';
        }
        if ($voucher) {
            $msg .= ' Voucher #' . $voucher->invoice_no . ' created. Student can pay to get access.';
        } else {
            $msg .= ' No voucher created (set batch/monthly fee to generate one).';
        }

        return redirect()->route('admin.fee-management.index')->with('success', $msg);
    }

    /** Reject a pending enrollment. */
    public function reject(Enrollment $enrollment): RedirectResponse
    {
        if ($enrollment->enrollment_status !== 'pending_approval') {
            return redirect()->route('admin.fee-management.index')->with('info', 'Enrollment is not pending approval.');
        }
        $enrollment->update(['enrollment_status' => 'rejected']);
        return redirect()->route('admin.fee-management.index')->with('success', 'Enrollment rejected.');
    }
}
