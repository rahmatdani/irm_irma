<?php
// app/Http/Controllers/EvaluationsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    public function create()
    {
        // Logika untuk menampilkan form
        return view('evaluations.create');
    }
    public function store(Request $request)
    {
        // Logika untuk menyimpan data
    }
}

