<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inisiatif_strategis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('sasaran_strategis_id')->constrained('sasaran_strategis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inisiatif_strategis');
    }
};
