<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layanan_reimbursement', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('nama_karyawan');
            $table->string('nip');
            $table->string('jenis_reimbursement');
            $table->string('keterangan');
            $table->string('bukti_reimbursement');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_reimbursement');
    }
};