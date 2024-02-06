<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'details',
        'status'
    ];

    public function claims()
    {
        return $this->belongsToMany(Claim::class, 'claim_procedure', 'procedure_id', 'claim_id');
    }

    public function claimProcedure()
    {
        return $this->hasMany(ClaimProcedure::class);
    }
}
