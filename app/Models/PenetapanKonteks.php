<?php

// app/Models/PenetapanKonteks.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenetapanKonteks extends Model
{
    use HasFactory;

    protected $table = 'penetapan_konteks';

    protected $fillable = ['sasaran_strategis', 'inisiatif_strategis', 'sasaran_operasional', 'deskripsi_risiko'];
}
