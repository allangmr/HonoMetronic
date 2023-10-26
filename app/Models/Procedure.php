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
        'procedure_start_date',
        'procedure_end_date',
        'status'
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class, 'id_procedure');
    }
}
