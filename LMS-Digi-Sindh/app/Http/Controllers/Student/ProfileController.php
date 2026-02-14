<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Invoice;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function idCard(): View
    {
        $user = auth()->user();
        $user->load('userDetail', 'role');
        $enrollments = $user->enrollments()->with('course')->latest()->get();

        return view('student.profile.id-card', compact('user', 'enrollments'));
    }

    public function feeStatus(): View
    {
        $user = auth()->user();
        $invoices = Invoice::where('user_id', $user->id)
            ->with('enrollment.course')
            ->latest()
            ->paginate(15);

        $pendingCount = Invoice::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'partial', 'overdue'])
            ->whereRaw('amount - amount_paid > 0')
            ->count();

        return view('student.profile.fee-status', compact('invoices', 'pendingCount'));
    }

    public function certificates(): View
    {
        $user = auth()->user();
        $enrollments = $user->enrollments()
            ->whereNotNull('completed_at')
            ->with('course')
            ->latest()
            ->get();

        return view('student.profile.certificates', compact('enrollments'));
    }

    public function certificateShow(Enrollment $enrollment): View|\Illuminate\Http\RedirectResponse
    {
        if ($enrollment->user_id !== auth()->id()) {
            abort(403);
        }
        if (! $enrollment->completed_at) {
            abort(404, 'Certificate not available.');
        }
        $enrollment->load('course');

        return view('student.profile.certificate-view', compact('enrollment'));
    }
}
