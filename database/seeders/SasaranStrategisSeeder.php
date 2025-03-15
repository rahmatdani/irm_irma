<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SasaranStrategisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        
        DB::table('sasaran_strategis')->insert([
            ['nama' => 'Sasaran Strategis 1'],
            ['nama' => 'Sasaran Strategis 2'],
            ['nama' => 'Sasaran Strategis 3'],
            // Tambahkan data lainnya sesuai kebutuhan
        
        ]);
        
    }
}
