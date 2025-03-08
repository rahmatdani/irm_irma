<?php

namespace Database\Seeders;

use App\Models\SubKategori;
use App\Models\KategoriRisiko;
use Illuminate\Database\Seeder;

class SubKategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriKepatuhan = KategoriRisiko::where('nama', 'Kepatuhan')->first();

        SubKategori::create([
            'nama' => 'Manajemen Audit Internal',
            'kategori_risiko_id' => $kategoriKepatuhan->id
        ]);
    }
}
