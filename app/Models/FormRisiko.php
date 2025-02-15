<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormRisiko extends Model
{
    protected $table = 'form_risiko';

    protected $fillable = [
        'kategori_risiko_id',
        'sub_kategori_id',
        'kelompok_risiko_id',
        'kejadian_risiko_id',
        'tipe_sumber_risiko',
        'penyebab',
        'area_dampak',
    ];

    public function kategori_risiko()
    {
        return $this->belongsTo(KategoriRisiko::class, 'kategori_risiko_id');
    }

    public function sub_kategori()
    {
        return $this->belongsTo(SubKategori::class, 'sub_kategori_id');
    }

    public function kelompok_risiko()
    {
        return $this->belongsTo(KelompokRisiko::class, 'kelompok_risiko_id');
    }

    public function kejadian_risiko()
    {
        return $this->belongsTo(KejadianRisiko::class, 'kejadian_risiko_id');
    }
}
