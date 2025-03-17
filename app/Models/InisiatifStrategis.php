<?php

// app/Models/InisiatifStrategis.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InisiatifStrategis extends Model
{
    use HasFactory;

    protected $table = 'inisiatif_strategis';

    protected $fillable = ['nama', 'sasaran_strategis_id'];
}
