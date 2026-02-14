<?php

use App\Models\Invoice;
use App\Services\FeeVoucherService;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('fees:generate-vouchers {month?}', function (?string $month = null) {
    $date = $month ? Carbon::parse($month) : Carbon::now();
    $service = app(FeeVoucherService::class);
    $result = $service->generateForMonth($date);
    $this->info("Fee vouchers for {$date->format('F Y')}: created {$result['created']}, skipped {$result['skipped']}.");
    if (! empty($result['errors'])) {
        foreach ($result['errors'] as $enrollmentId => $msg) {
            $this->error("Enrollment {$enrollmentId}: {$msg}");
        }
    }
})->purpose('Generate monthly fee vouchers for active enrollments (run on 1st of each month)');

Artisan::command('fees:mark-overdue', function () {
    $today = Carbon::today()->toDateString();
    $updated = Invoice::where('due_date', '<', $today)
        ->whereColumn('amount_paid', '<', 'amount')
        ->whereIn('status', ['pending', 'partial'])
        ->update(['status' => 'overdue']);
    $this->info("Marked {$updated} invoice(s) as overdue.");
})->purpose('Mark unpaid invoices past due date as overdue (run daily)');

Schedule::command('fees:generate-vouchers')->monthlyOn(1, '0:00');
Schedule::command('fees:mark-overdue')->dailyAt('01:00');
