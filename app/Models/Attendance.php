<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Attendance extends Model
{
    protected $guarded = [];

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

        $response = Http::withBasicAuth($username, $password)->get($api_url, $params);

        if ($response->successful()) {
            $data = $response->json();
            // Process the API response data here
            return $data['data'];
        } else {
            // Handle the API request error
            return $response->json();
        }
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d F Y', $value)->format('Y-m-d');
    }
}
