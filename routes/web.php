<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUmum;
use App\Http\Controllers\ControllerLogin;



Route::get('/', [ControllerLogin::class, 'login'])->name('login');
Route::post('/proses-login', [ControllerLogin::class, 'prosesLogin'])->name('prosesLogin');


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::post('/logout', [ControllerUmum::class, 'prosesLogout'])->name('prosesLogout');
    Route::get('/summary-executive', [ControllerUmum::class, 'summaryExecutive'])->name('summaryExecutive');

    include_once('modules/karyawan.php');

    include_once('modules/manager.php');

});