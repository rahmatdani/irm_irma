<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejadianRisiko extends Model
{
    use HasFactory;

    protected $table = 'kejadian_risiko';

    protected $fillable = [
        'deskripsi',
        'kelompok_risiko_id',
        'kategori_risiko_id'  // Tambahkan ini
    ];

    public function kelompokRisiko()
    {
        return $this->belongsTo(KelompokRisiko::class, 'kelompok_risiko_id');
    }

    public function kategoriRisiko()  // Tambahkan relasi ini
    {
        return $this->belongsTo(KategoriRisiko::class, 'kategori_risiko_id');
    }
}
