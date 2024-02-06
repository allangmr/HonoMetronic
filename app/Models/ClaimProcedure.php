<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimProcedure extends Model
{
    use HasFactory;

    protected $table = 'claim_procedure';

    protected $fillable = [
        'claim_id',
        'procedure_id',
    ];

    // Define the relationship with the Claim model
    public function claim()
    {
        return $this->belongsTo(Claim::class, 'claim_id');
    }

    // Define the relationship with the Procedure model
    public function procedure()
    {
        return $this->belongsTo(Procedure::class, 'procedure_id');
    }
}
