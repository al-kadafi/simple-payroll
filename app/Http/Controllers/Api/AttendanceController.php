<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

class AttendanceController extends Controller
{
    public function getAbsentDays(Request $request)
    {
        //initialize rule
        $rules = [
            'employee_id' => 'required',
            'month_period' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        //validation checking
        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $err) {
                $message = implode(', ', $err);
                break;
            }

            return response()->json(['message' => $message, 'error_code' => '400'], 400);
        }

        $date = Carbon::parse($request->month_period);
        //get year and month
        $year = $date->year;
        $month = $date->month;

        //get first and end date of month
        $start_date = Carbon::create($year, $month, 1);
        $end_date = $date->endOfMonth();

        $absent_days = 0;
        $working_day = 0;

        //check all date
        while ($start_date <= $end_date) {
            // check day
            if ($start_date->dayOfWeek != Carbon::SATURDAY && $start_date->dayOfWeek != Carbon::SUNDAY) {
                // check attendance data
                $attendanceCount = Attendance::where('employee_id', $request->employee_id)
                    ->whereDate('date', $start_date)
                    ->count();

                // Add absent day when no data found
                if ($attendanceCount == 0) {
                    $absent_days++;
                } else {
                    $working_day++;
                }
            }

            // move to next day
            $start_date->addDay();
        }

        $res = ['absent_days' => $absent_days, 'working_days' => $working_day];

        return response()->json(['message' => 'success', 'data' => $res]);
    }
}
