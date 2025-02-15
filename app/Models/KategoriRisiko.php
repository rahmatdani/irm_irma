<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriRisiko extends Model
{
    use HasFactory;

    protected $table = 'kategori_risiko';

    protected $fillable = ['nama'];

    public function subKategori()
    {
        return $this->hasMany(SubKategori::class, 'kategori_risiko_id');
    }

    public function kejadianRisiko()
    {
        return $this->hasMany(KejadianRisiko::class);
    }
}
