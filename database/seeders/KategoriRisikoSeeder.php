<?php

namespace Database\Seeders;

use App\Models\KategoriRisiko;
use Illuminate\Database\Seeder;

class KategoriRisikoSeeder extends Seeder
{
    public function run(): void
    {
        KategoriRisiko::create([
            'nama' => 'Kepatuhan'
        ]);
    }
}
