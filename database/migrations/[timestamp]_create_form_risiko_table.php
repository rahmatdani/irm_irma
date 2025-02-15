<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_risiko', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_risiko_id');
            $table->foreignId('sub_kategori_id');
            $table->foreignId('kelompok_risiko_id');
            $table->foreignId('kejadian_risiko_id');
            $table->string('tipe_sumber_risiko');
            $table->text('penyebab');
            $table->string('area_dampak');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_risiko');
    }
};
