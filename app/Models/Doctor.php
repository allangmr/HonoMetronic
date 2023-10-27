<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'details',
        'status'
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class, 'id_doctor');
    }
}
