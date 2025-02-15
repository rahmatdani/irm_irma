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
        Schema::create('kepatuhan_manajemen_audit_internal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kepatuhan_id')
                  ->constrained('kepatuhan')
                  ->onDelete('cascade')
                  ->name('fk_kepatuhan_id'); // Nama constraint yang lebih pendek
            $table->foreignId('manajemen_audit_internal_id')
                  ->constrained('manajemen_audit_internal')
                  ->onDelete('cascade')
                  ->name('fk_manajemen_audit_internal_id'); // Nama constraint yang lebih pendek
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepatuhan_manajemen_audit_internal');
    }
};
