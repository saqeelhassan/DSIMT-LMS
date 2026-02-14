<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use App\Services\FeeVoucherService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(Request $request): View
    {
        $invoices = Invoice::with(['user.userDetail', 'enrollment.course'])
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create(): View
    {
        $students = User::whereHas('role', fn ($q) => $q->where('name', 'Student'))->where('is_active', true)->with('userDetail')->orderBy('email')->get();
        $enrollments = Enrollment::with('course', 'user')->where('enrollment_status', 'active')->get();

        return view('admin.invoices.create', compact('students', 'enrollments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'enrollment_id' => ['nullable', 'integer', 'exists:enrollments,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'due_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $invoiceNo = 'INV-' . str_pad((string) (Invoice::max('id') + 1), 6, '0', STR_PAD_LEFT);
        Invoice::create([
            'invoice_no' => $invoiceNo,
            'user_id' => $validated['user_id'],
            'enrollment_id' => $validated['enrollment_id'] ?? null,
            'amount' => $validated['amount'],
            'amount_paid' => 0,
            'due_date' => $validated['due_date'],
            'status' => 'pending',
            'description' => $validated['description'] ?? null,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice created.');
    }

    public function show(Invoice $invoice): View
    {
        $invoice->load(['user.userDetail', 'enrollment.course', 'payments']);
        $paymentMethods = \App\Models\PaymentMethod::orderBy('name')->get();

        return view('admin.invoices.show', compact('invoice', 'paymentMethods'));
    }

    public function recordPayment(Request $request, Invoice $invoice): RedirectResponse
    {
        $balance = (float) max(0, $invoice->amount - $invoice->amount_paid);
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01', 'max:' . $balance],
            'payment_method_id' => ['nullable', 'integer', 'exists:payment_methods,id'],
            'method_note' => ['nullable', 'string', 'max:100'],
            'paid_at' => ['required', 'date'],
            'reference' => ['nullable', 'string', 'max:100'],
        ]);

        DB::transaction(function () use ($invoice, $validated) {
            Payment::create([
                'invoice_id' => $invoice->id,
                'amount' => $validated['amount'],
                'payment_method_id' => $validated['payment_method_id'] ?? null,
                'method_note' => $validated['method_note'] ?? 'Cash',
                'paid_at' => $validated['paid_at'],
                'reference' => $validated['reference'] ?? null,
                'recorded_by' => auth()->id(),
            ]);

            $totalPaid = $invoice->amount_paid + (float) $validated['amount'];
            $status = $totalPaid >= $invoice->amount ? 'paid' : 'partial';
            $invoice->update([
                'amount_paid' => $totalPaid,
                'status' => $status,
            ]);

            if ($invoice->enrollment_id) {
                $enrollment = $invoice->enrollment;
                $enrollment->fees_collected = ($enrollment->fees_collected ?? 0) + (float) $validated['amount'];
                $enrollment->save();
            }
        });

        return redirect()->route('admin.invoices.show', $invoice)->with('success', 'Payment recorded.');
    }

    /** Generate monthly fee vouchers for the current month (or optional month). */
    public function generateVouchers(Request $request): RedirectResponse
    {
        $month = $request->filled('month') ? Carbon::parse($request->month) : Carbon::now();
        $service = app(FeeVoucherService::class);
        $result = $service->generateForMonth($month);

        $msg = "Generated {$result['created']} voucher(s) for {$month->format('F Y')}. Skipped {$result['skipped']} (already exist).";
        if (! empty($result['errors'])) {
            $msg .= ' ' . count($result['errors']) . ' error(s).';
        }

        return redirect()->route('admin.invoices.index')->with('success', $msg);
    }
}
