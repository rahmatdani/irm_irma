<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepatuhan extends Model
{
    use HasFactory;

    protected $table = 'kepatuhan';

    protected $fillable = ['nama'];

    public function manajemenAuditInternal()
    {
        return $this->belongsToMany(ManajemenAuditInternal::class, 'kepatuhan_manajemen_audit_internal');
    }
}
