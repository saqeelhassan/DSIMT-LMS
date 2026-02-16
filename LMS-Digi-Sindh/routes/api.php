<?php

use App\Http\Controllers\Api\BiometricPunchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Biometric device API (no session / no CSRF)
|--------------------------------------------------------------------------
| Devices send POST with token in header. See BIOMETRIC_API_TOKEN in .env
*/

Route::post('/biometric/punch', BiometricPunchController::class)
    ->middleware(\App\Http\Middleware\ValidateBiometricToken::class)
    ->name('api.biometric.punch');
