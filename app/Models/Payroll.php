<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'months',
        'employe_id',
        'basic_salary',
        'house_rent_allowance',
        'convey_allowance',
        'spacial_allowance',
        'medical_allowance',
        'total_allowance',
        'income_tax',
        'pencion_tax',
        'insurance',
        'total_deduction',
        'total_amount',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
