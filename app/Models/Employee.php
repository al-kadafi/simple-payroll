<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Employee extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function getWorkingPeriod($month_period = null)
    {
        $date = $month_period ? new \DateTime($month_period) : new \DateTime();
        $join = new \DateTime($this->join_date);

        // Calculate the difference
        $interval = $date->diff($join);

        // Access the difference in years, months, and days
        $years = $interval->y;
        $month = $interval->m;
        $day = $interval->d;

        if ($years > 0) {
            $years = $years . ($years == 1 ? ' Year ' : ' Years ');
        } else {
            $years = '';
        }

        if ($month > 0) {
            $month = $month . ($month == 1 ? ' Month ' : ' Months ');
        } else {
            $month = $day . ($day == 1 ? ' Day ' : ' Days ');
        }

        return $years . $month;
    }

    public function getWorkingYearAttribute()
    {
        $currentDate = new \DateTime();
        $join = new \DateTime($this->join_date);

        // Calculate the difference
        $interval = $currentDate->diff($join);

        // Access the difference in years, months, and days
        $years = $interval->y;

        return $years;
    }

    public function setJoinDateAttribute($value)
    {
        $this->attributes['join_date'] = Carbon::createFromFormat('d F Y', $value)->format('Y-m-d');
    }

    public function setBasicSalaryAttribute($value)
    {
        $this->attributes['basic_salary'] = deformat_currency($value);
    }

    public function setAllowanceAttribute($value)
    {
        $this->attributes['allowance'] = deformat_currency($value);
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d F Y', $value)->format('Y-m-d');
    }

    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'employee_id');
    }

    public function overtime()
    {
        return $this->hasMany('App\Models\Overtime', 'employee_id');
    }

    public function slip()
    {
        return $this->hasMany('App\Models\Slip', 'employee_id');
    }
}
