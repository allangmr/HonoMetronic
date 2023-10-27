<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'details',
        'claim_submission_date',
        'claim_resolution_date',
        'status',
        'id_patient',
        'id_doctor',
        'id_procedure',
    ];

    
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class, 'id_procedure');
    }
}
