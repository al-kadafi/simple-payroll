<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = [
        'id',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
