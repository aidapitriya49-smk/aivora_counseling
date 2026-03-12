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
        Schema::create('_data_guru', function (Blueprint $table) {
        $table->id();
        $table->string('nip')->unique();
        $table->string('nama_guru_bk');
        $table->string('jenis_kelamin'); 
        $table->string('telepon');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_data_guru');
    }
};
