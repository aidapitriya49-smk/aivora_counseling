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
    Schema::create('pelanggaran', function (Blueprint $table) {
        $table->string('id_pelanggaran', 10)->primary();
        $table->string('id_guru_bk', 10);
        $table->string('id_siswa', 10);
        // Perbaikan di sini: gunakan enum, bukan string
        $table->enum('jenis_pelanggaran', ['ringan', 'sedang', 'berat']); 
        $table->string('tanggal');
        $table->integer('poin'); // Sebaiknya integer jika untuk perhitungan
        $table->text('keterangan');
        $table->timestamps();

        $table->foreign('id_guru_bk')->references('id_guru_bk')->on('guru_bk');
        $table->foreign('id_siswa')->references('id_siswa')->on('siswa');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggaran');
    }
};