<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriRisiko;
use App\Models\SubKategori;
use App\Models\KelompokRisiko;
use App\Models\KejadianRisiko;
use App\Models\FormRisiko;

class ResikoController extends Controller
{
    public function index()
    {
        $kategori_resiko = KategoriRisiko::all();
        $kelompok_resiko = KelompokRisiko::all();
        $kejadian_resiko = KejadianRisiko::all();
        $risiko_list = FormRisiko::with(['kategori_risiko', 'sub_kategori', 'kelompok_risiko', 'kejadian_risiko'])->get();

        return view('index', compact(
            'kategori_resiko',
            'kelompok_resiko',
            'kejadian_resiko',
            'risiko_list'
        ));
    }

    public function getSubKategori($id)
    {
        $subKategori = SubKategori::where('kategori_risiko_id', $id)->get();
        return response()->json($subKategori);
    }

    public function getKejadianRisiko($id)
    {
        $kejadianRisiko = KejadianRisiko::where('kelompok_risiko_id', $id)->get();
        // Perhatikan perubahan dari 'kelompok_resiko_id' menjadi 'kelompok_risiko_id'
        return response()->json($kejadianRisiko);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_resiko' => 'required',
            'sub_kategori' => 'required',
            'kelompok_resiko' => 'required',
            'kejadian_resiko' => 'required',
            'tipe_sumber_risiko' => 'required|string|max:255',
            'penyebab' => 'required|string',
            'area_dampak' => 'required|string|max:255',
        ]);

        // Simpan ke database
        FormRisiko::create([
            'kategori_risiko_id' => $request->kategori_resiko,
            'sub_kategori_id' => $request->sub_kategori,
            'kelompok_risiko_id' => $request->kelompok_resiko,
            'kejadian_risiko_id' => $request->kejadian_resiko,
            'tipe_sumber_risiko' => $request->tipe_sumber_risiko,
            'penyebab' => $request->penyebab,
            'area_dampak' => $request->area_dampak,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $risiko = FormRisiko::findOrFail($id);
        return response()->json($risiko);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_resiko' => 'required',
            'sub_kategori' => 'required',
            'kelompok_resiko' => 'required',
            'kejadian_resiko' => 'required',
            'tipe_sumber_risiko' => 'required|string|max:255',
            'penyebab' => 'required|string',
            'area_dampak' => 'required|string|max:255',
        ]);

        $risiko = FormRisiko::findOrFail($id);
        $risiko->update([
            'kategori_risiko_id' => $request->kategori_resiko,
            'sub_kategori_id' => $request->sub_kategori,
            'kelompok_risiko_id' => $request->kelompok_resiko,
            'kejadian_risiko_id' => $request->kejadian_resiko,
            'tipe_sumber_risiko' => $request->tipe_sumber_risiko,
            'penyebab' => $request->penyebab,
            'area_dampak' => $request->area_dampak,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $risiko = FormRisiko::findOrFail($id);
        $risiko->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
