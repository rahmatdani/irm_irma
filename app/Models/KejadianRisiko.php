<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejadianRisiko extends Model
{
    use HasFactory;

    protected $table = 'kejadian_risiko';

    protected $fillable = ['nama', 'kelompok_risiko_id'];

    public function kelompokRisiko()
    {
        return $this->belongsTo(KelompokRisiko::class, 'kelompok_risiko_id');
    }
}
