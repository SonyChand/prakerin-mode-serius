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
        Schema::create('alumni_prakerins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('asal_sekolah');
            $table->string('jurusan');
            $table->year('tahun_mulai');
            $table->year('tahun_selesai');
            $table->string('foto')->nullable(); // Path untuk foto
            $table->string('hasil_karya')->nullable(); // Path untuk file karya (PDF, ZIP, dll)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa yang menginput
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_prakerins');
    }
};