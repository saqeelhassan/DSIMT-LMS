<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Monthly fee voucher due day
    |--------------------------------------------------------------------------
    | Day of the billing month by which the voucher is due (e.g. 10 = 10th).
    | Used when generating monthly vouchers.
    */
    'voucher_due_day' => env('FEES_VOUCHER_DUE_DAY', 10),

    /*
    |--------------------------------------------------------------------------
    | Fee reminder driver (admin "Remind" action)
    |--------------------------------------------------------------------------
    | 'log' = log message only (default). 'sms' = send via SMS gateway (implement in FeeReminderService).
    */
    'reminder_driver' => env('FEE_REMINDER_DRIVER', 'log'),
];
