<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Overtime extends Model
{
    protected $guarded = [];

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
