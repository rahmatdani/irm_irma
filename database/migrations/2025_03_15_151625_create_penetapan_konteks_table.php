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
    Schema::create('penetapan_konteks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('sasaran_strategis_id')->constrained('sasaran_strategis')->onDelete('cascade');
        $table->foreignId('inisiatif_strategis_id')->constrained('inisiatif_strategis')->onDelete('cascade');
        $table->string('sasaran_operasional');
        $table->text('deskripsi_risiko');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penetapan_konteks');
    }
};
