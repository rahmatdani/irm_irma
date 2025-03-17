<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InisiatifStrategisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inisiatif_strategis')->insert([
            ['nama' => 'Inisiatif Strategis 1', 'sasaran_strategis_id' => 1],
            ['nama' => 'Inisiatif Strategis 2', 'sasaran_strategis_id' => 1],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
