<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_patient',
        'claim_id',
        'details',
        'claim_submission_date',
        'claim_resolution_date',
        'status',
        'id_doctor'
    ];

    
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function claimProcedure()
    {
        return $this->hasMany(ClaimProcedure::class);
    }

    public function procedures()
    {
        return $this->belongsToMany(Procedure::class, 'claim_procedure')
                    ->withPivot('id','proc_start_date', 'proc_end_date', 'details', 'status');
    }

}
