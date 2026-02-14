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
];
