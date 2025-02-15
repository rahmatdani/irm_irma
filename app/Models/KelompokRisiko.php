<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokRisiko extends Model
{
    use HasFactory;

    protected $table = 'kelompok_risiko';

    protected $fillable = ['nama'];

    public function kejadianRisiko()
    {
        return $this->hasMany(KejadianRisiko::class, 'kelompok_risiko_id');
    }
}
