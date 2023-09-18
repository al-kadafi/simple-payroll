<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Http;
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

    /**
     * get attendance data
     *
     * @param  mixed $request
     * @return void
     */
    public static function getAttendanceData($employee_id, $month)
    {
        $api_url = config('app.api_test_url') . '/api/get-absent-days';
        //param
        $params = [
            'employee_id' => $employee_id,
            'month_period' => $month,
        ];

        //cred
        $username = '76FD2153EFB37';
        $password = 'E4gWSjezm67vRvr2IIBhdcIVH6M5NDp7Dv4fSqrXRvuJbNEChThRyp2QaGcBIwM6';

        try {
            $response = Http::withBasicAuth($username, $password)->get($api_url, $params);

            if ($response->successful()) {
                $data = $response->json();
                // Process the API response data here
                return $data['data'];
            } else {
                // Handle the API request error
                return $response->json();
            }
        } catch (\Throwable $th) {
            return ['message' => 'API host not started, please start use php artisan serve --port 3001', 'error_code' => '500'];
        }
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
