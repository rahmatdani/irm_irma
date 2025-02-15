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
        Schema::create('kejadian_risiko', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_risiko_id')->constrained('kategori_risiko')->onDelete('cascade');
            $table->foreignId('kelompok_risiko_id')->constrained('kelompok_risiko')->onDelete('cascade');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kejadian_risiko');
    }
};
