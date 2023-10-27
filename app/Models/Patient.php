<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'name',
        'dni',
        'age',
        'born_date',
        'insurance_companies',
        'email',
        'phone',
        'address',
    ];
    
    public function claims()
    {
        return $this->hasMany(Claim::class, 'id_patient');
    }

}
