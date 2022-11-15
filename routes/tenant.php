<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::group([
    'middleware' => ['tenant', PreventAccessFromCentralDomains::class], // See the middleware group in Http Kernel
    'as' => 'tenant.',
], static function () {
    Route::redirect('/', '/home');

    Route::prefix('home')->group(function () {
        Route::get('/', static function () {
            return view('welcome');
        });
    });
});
