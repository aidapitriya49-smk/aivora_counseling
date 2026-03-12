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
        Schema::create('guru_bk', function (Blueprint $table) {
            $table->string('id_guru_bk', 10)->primary();
            $table->string('id_user', 10);
            $table->Integer('nip');
            $table->string('nama_guru_bk', 50);
            $table->enum('jk', ['P', 'L']);
            $table->string('no_tlp', 13);
            $table->timestamps();
        });
}

     /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_bk');
    }
};