<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cnic',
        'department_id',
        'gender',
        'religion',
        'dob',
        'contact',
        'address',
        'joining_date',
        'picture',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function department () {
        return $this->belongsTo(Department::class);
    }

    public function payrolls () {
        return $this->hasMany(Payroll::class);
    }

}
