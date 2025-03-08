<?php

namespace Database\Seeders;

use App\Models\KelompokRisiko;
use Illuminate\Database\Seeder;

class KelompokRisikoSeeder extends Seeder
{
    public function run(): void
    {
        $kelompokList = [
            'Korupsi',
            'Pemenuhan Laporan',
            'Kebijakan dan Konsultasi',
            'Kolusi',
            'Laporan',
            'Risiko Kecurangan (Fraud Risk)',
            'Penyuapan',
            'Gratifikasi',
            'Risiko Etika'
        ];

        foreach ($kelompokList as $kelompok) {
            KelompokRisiko::create(['nama' => $kelompok]);
        }
    }
}
