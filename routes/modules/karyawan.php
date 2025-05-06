<?php

use App\Http\Controllers\KaryawanController;


 // Route untuk modul cuti
 Route::get('/form-pengajuan-cuti', [KaryawanController::class, 'cuti_form'])->name('cuti.form');
 Route::get('/list-pengajuan-cuti', [KaryawanController::class, 'cuti_list'])->name('cuti.list');
 Route::post('/save-pengajuan-cuti', [KaryawanController::class, 'cuti_save'])->name('cuti.save');

 // Route untuk modul reimbursement
 Route::get('/form-pengajuan-reimb', [KaryawanController::class, 'reimburst_form'])->name('reimburst.form');
 Route::get('/list-pengajuan-reimb', [KaryawanController::class, 'reimburst_list'])->name('reimburst.list');
 Route::post('/save-reimbursement', [KaryawanController::class, 'reimburst_save'])->name('reimburst.save');