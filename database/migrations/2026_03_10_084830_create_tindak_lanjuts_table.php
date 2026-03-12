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
    Schema::create('tindak_lanjut', function (Blueprint $table) {
    $table->string('id_tindak_lanjut', 10)->primary();
    $table->string('id_konseling', 10)->nullable(); // Relasi ke konseling
    $table->string('id_siswa', 10);
    $table->string('tindakan');
    $table->date('tanggal');
    $table->enum('status', ['proses', 'selesai', 'dibatalkan']);
    $table->text('keterangan')->nullable();
    $table->timestamps();

    // Foreign Keys
    $table->foreign('id_siswa')->references('id_siswa')->on('siswa');
    $table->foreign('id_konseling')->references('id_konseling')->on('konseling');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindak_lanjuts');
    }
};
