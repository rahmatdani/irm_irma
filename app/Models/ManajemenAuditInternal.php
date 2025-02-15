<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenAuditInternal extends Model
{
    use HasFactory;

    protected $table = 'manajemen_audit_internal';

    protected $fillable = ['nama'];

    public function kepatuhan()
    {
        return $this->belongsToMany(Kepatuhan::class, 'kepatuhan_manajemen_audit_internal');
    }
}
