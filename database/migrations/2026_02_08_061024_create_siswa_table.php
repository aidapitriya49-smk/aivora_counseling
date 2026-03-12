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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id_siswa', 10)->primary();
            $table->string('id_user', 10);
            $table->string('nis_siswa', 15);
            $table->string('nama_siswa', 50);
            $table->string('kelas', 10);
            $table->string('jurusan', 30);
            $table->string('no_hp', 13);
            $table->string('alamat', 50);
            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};