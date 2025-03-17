<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenetapanKonteksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sasaran_strategis')->insert([
            ['nama' => 'Sasaran Strategis 1'],
            ['nama' => 'Sasaran Strategis 2'],
        ]);
    
        DB::table('inisiatif_strategis')->insert([
            ['nama' => 'Inisiatif Strategis 1', 'sasaran_strategis_id' => 1],
            ['nama' => 'Inisiatif Strategis 2', 'sasaran_strategis_id' => 2],
        ]);
    }
}
