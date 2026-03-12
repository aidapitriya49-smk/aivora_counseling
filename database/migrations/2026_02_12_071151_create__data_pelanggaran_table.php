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
        Schema::create('_data_pelanggaran', function (Blueprint $table) {
        $table->id();
        $table->string('id_guru_bk');
        $table->string('id_siswa');
        $table->string('jenis_pelanggaran'); 
        $table->string('tanggal');
        $table->string('poin');
        $table->text('keterangan');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_data_pelanggaran');
    }
};
