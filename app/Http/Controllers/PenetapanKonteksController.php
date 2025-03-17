<?php

namespace App\Http\Controllers;

use App\Models\SasaranStrategis;
use App\Models\InisiatifStrategis;
use Illuminate\Http\Request;

class PenetapanKonteksController extends Controller

{
     public function index()
    {
        // Ambil data dari tabel sasaran_strategis
        $sasaranStrategis = SasaranStrategis::all();
        $inisiatifStrategis = InisiatifStrategis::all();

        // Kembalikan view dengan data
        // return view('penetapan_konteks.index', compact('sasaranStrategis'));
        return view('penetapan_konteks.index', compact('sasaranStrategis', 'inisiatifStrategis'));
    }
    public function create()
    {

        $sasaranStrategis = SasaranStrategis::all();
        $inisiatifStrategis = InisiatifStrategis::all();
        return view('penetapan_konteks.create', compact('sasaranStrategis', 'inisiatifStrategis'));   
    }

    public function store(Request $request)
    {
       
    }
}
