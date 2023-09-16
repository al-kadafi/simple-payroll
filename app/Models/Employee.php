<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['id'];

    public function getWorkingPeriodAttribute()
    {
        $currentDate = new \DateTime();
        $join = new \DateTime($this->join_date);

        // Calculate the difference
        $interval = $currentDate->diff($join);

        // Access the difference in years, months, and days
        $years = $interval->y;
        $month = $interval->m;
        $day = $interval->d;

        if ($years > 0) {
            $years = $years . ($years == 1 ? ' Year ':' Years ');
        } else {
            $years = '';
        }

        if ($month > 0) {
            $month = $month . ($years == 1 ? ' Month ':' Months ');
        } else {
            $month = $day . ($years == 1 ? ' Day ':' Days ');
        }

        return $years . $month;
    }

    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'employee_id');
    }

    public function overtime()
    {
        return $this->hasMany('App\Models\Overtime', 'employee_id');
    }
}
