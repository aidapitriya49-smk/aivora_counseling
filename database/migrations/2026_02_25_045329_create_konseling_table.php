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
    Schema::create('konseling', function (Blueprint $table) {
        $table->string('id_konseling', 10)->primary();
        $table->string('id_guru_bk', 10);
        $table->string('id_siswa', 10);
        $table->date('tanggal');
        $table->enum('jenis_konseling', ['sosial', 'karir', 'pribadi']);
        $table->text('catatan_konseling');
        $table->enum('status', ['ya', 'tidak']);
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
        Schema::dropIfExists('konseling');
    }
};