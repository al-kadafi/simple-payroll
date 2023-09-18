<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Overtime extends Model
{
    protected $guarded = [];

    public static function getOvertimeCount($employee_id, $month_period)
    {
        // Create Carbon instances for the start and end of the given month
        $date = Carbon::parse($month_period);
        //get year and month
        $year = $date->year;
        $month = $date->month;

        //get first and end date of month
        $start_date = Carbon::create($year, $month, 1);
        $end_date = $date->endOfMonth();

        // Calculate the total overtime hours
        $total = Overtime::where('employee_id', $employee_id)
            ->whereBetween('start_time', [$start_date, $end_date])
            ->sum(DB::raw('TIME_TO_SEC(TIMEDIFF(end_time, start_time)) / 3600 '));

        return round($total);
    }

    public function getDurationAttribute()
    {
        // Create two DateTime instances
        $start = Carbon::parse($this->start_time);
        $end = Carbon::parse($this->end_time);

        // Calculate the difference in hours
        $diff = $start->diffInHours($end);

        return $diff . ($diff == 1 ? ' Hour' : ' Hours');
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::createFromFormat('d M Y H:i', $value)->format('Y-m-d H:i');
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = Carbon::createFromFormat('d M Y H:i', $value)->format('Y-m-d H:i');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
