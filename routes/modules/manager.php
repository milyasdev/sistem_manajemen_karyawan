<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Database\Capsule\Manager;

//management user karyawan
Route::get('/form-tambah-karyawan', [ManagerController::class, 'formTambahKaryawan'])->name('formTambahKaryawan');
Route::get('/list-data-karyawan', [ManagerController::class, 'listDataKaryawan'])->name('listDataKaryawan');
Route::post('/proses-tambah-karyawan', [ManagerController::class, 'prosesTambahKaryawan'])->name('prosesTambahKaryawan');
Route::get('/proses-blokir-karyawan/{id}', [ManagerController::class, 'prosesBlokirKaryawan'])->name('prosesBlokir');
Route::get('/proses-open-karyawan/{id}', [ManagerController::class, 'prosesOpenKaryawan'])->name('prosesOpen');

//layanan pengajuan cuti
Route::get('/cuti-pengajuan-karyawan', [ManagerController::class, 'listPengajuanCutiKaryawan'])->name('listPengajuanKaryawan');
Route::get('/list-cuti', [ManagerController::class, 'listCuti'])->name('listCuti');
Route::get('/proses-approve-cuti/{id}', [ManagerController::class, 'approveCuti'])->name('approveCuti');
Route::get('/proses-tolak-cuti/{id}', [ManagerController::class, 'tolakCuti'])->name('tolakCuti');

//layanan pengajuan reimbursement
Route::get('/reimburst-pengajuan', [ManagerController::class, 'reimburstPengajuan'])->name('reimburstPengajuan');
Route::get('/list-reimburst', [ManagerController::class, 'listReimburst'])->name('listReimburst');
Route::get('/proses-approve-reimb/{id}', [ManagerController::class, 'approveReimbursement'])->name('approveReimbursement');
Route::get('/proses-tolak-reimb/{id}', [ManagerController::class, 'tolakReimbursement'])->name('tolakReimbursement');
