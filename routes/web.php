<?php

use App\Http\Controllers\Central as Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', static function () {
    return view('welcome');
});

Route::get('/register', [
    Controllers\RegisterTenantController::class,
    'show',
])->name('central.tenants.register');

Route::post('/register/submit', [
    Controllers\RegisterTenantController::class,
    'submit',
])->name('central.tenants.register.submit');

Route::get('/login', [Controllers\LoginTenantController::class, 'show'])->name(
    'central.tenants.login'
);

Route::post('/login/submit', [
    Controllers\LoginTenantController::class,
    'submit',
])->name('central.tenants.login.submit');
