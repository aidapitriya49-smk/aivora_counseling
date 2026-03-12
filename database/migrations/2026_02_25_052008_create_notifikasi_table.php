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
        Schema::create('notifikasi', function (Blueprint $table) {
            // Sesuai ERD: id_notifikasi varchar(10) Primary Key
            $table->string('id_notifikasi', 10)->primary();
            
            // Foreign Key ke tabel konseling dan pelanggaran
            $table->string('id_konseling', 10)->nullable();
            $table->string('id_pelanggaran', 10)->nullable();
            
            $table->text('isi_pesan');
            $table->text('tujuan'); // Biasanya untuk nomor HP atau Email tujuan
            $table->date('tanggal_terkirim');
            $table->enum('status', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
            // Definisi Foreign Key (Pastikan tabel konseling & pelanggaran sudah ada)
            $table->foreign('id_konseling')->references('id_konseling')->on('konseling')->onDelete('cascade');
            $table->foreign('id_pelanggaran')->references('id_pelanggaran')->on('pelanggaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};