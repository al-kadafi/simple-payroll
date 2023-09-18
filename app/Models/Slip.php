<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Slip extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
