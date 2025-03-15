<?php

namespace App\Http\Controllers;

use App\Models\SasaranStrategis;
use Illuminate\Http\Request;

class PenetapanKonteksController extends Controller
{
    public function create()
    {
        $sasaranStrategis = SasaranStrategis::all();
        return view('penetapan_konteks.create', compact('sasaranStrategis'));
    }

    public function store(Request $request)
    {
       
    }
}
