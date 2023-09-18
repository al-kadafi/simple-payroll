<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Slip;
use App\Models\Overtime;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SlipController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        //get filter data
        $filter = $request->month ? Carbon::parse($request->month) : null;

        //get year and month value as number
        $year = $filter ? $filter->year : Carbon::now()->year;
        $month = $filter ? $filter->month : Carbon::now()->month;

        //get data according year and month
        $slips = Slip::whereMonth('month_period', $month)
            ->whereYear('month_period', $year)
            ->latest()
            ->get();

        return view('dashboard.salary', ['slips' => $slips]);
    }

    /**
     * show slip
     *
     * @param  mixed $request
     * @return void
     */
    public function show(Request $request)
    {
        //find slip data
        $slip = Slip::find($request->id);

        if (empty($slip)) {
            return redirect()
                ->back()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => 'The slip data not found',
                ]);
        }

        //call api get attendance
        $attendance_data = Attendance::getAttendanceData($slip->employee->id, $slip->month_period);

        if (isset($attendance_data['error_code'])) {
            return redirect()
                ->back()
                ->with('message', [
                    'title' => 'Api call error',
                    'type' => 'error',
                    'msg' => $attendance_data['message'],
                ]);
        }
        //get overtime count
        $overtime_count = Overtime::getOvertimeCount($slip->employee->id, $slip->month_period);

        $slip_data = $this->getSlipData($slip->employee, $attendance_data, $overtime_count);
        $slip['detail'] = $slip_data;

        return view('dashboard.slip', ['slip' => $slip]);
    }

    /**
     * generate slip
     *
     * @param  mixed $request
     * @return void
     */
    public function generate(Request $request)
    {
        //get filter data
        $filter = Carbon::createFromFormat('Y-m', $request->month);

        //get year and month value as number
        $year = $filter->year;
        $month = $filter->month;

        // Calculate the last day of the month
        $lastDay = $filter->endOfMonth();

        // Format the last day as 'Y-m-d'
        $formatted_date = $lastDay->format('Y-m-d');

        //get all employee
        $employees = Employee::whereDate('join_date', '<=', $formatted_date)->get();
        $count = 0;

        foreach ($employees as $employee) {
            $exist = Slip::where('employee_id', $employee->id)
                ->whereMonth('month_period', $month)
                ->whereYear('month_period', $year)
                ->first();

            //check employee slip on selected month
            if (empty($exist)) {
                //create slip data with status draft
                Slip::create(['employee_id' => $employee->id, 'month_period' => $formatted_date]);
                $count++;
            }
        }

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => $count . ' slip successfully created for ' . Carbon::createFromFormat('n', $month)->format('F'),
            ]);
    }

    /**
     * update status slip
     *
     * @param  mixed $request
     * @return void
     */
    public function update(Request $request)
    {
        //get slip data
        $slip = Slip::find(decrypt($request->id));

        if (empty($slip)) {
            return redirect()
                ->back()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => 'The slip data not found',
                ]);
        }

        //save new status
        $slip->status = $request->status;
        $slip->save();

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'The slip status successfully updated',
            ]);
    }

    /**
     * get slip data
     *
     * @param  mixed $request
     * @return void
     */
    private function getSlipData(Employee $employee, $attendance, $overtime_hours_count)
    {
        $basic_salary = $employee->basic_salary;
        $basic_allowance = $employee->allowance;
        $working_year = $employee->working_year;
        $status = $employee->status;

        // Calculate insentif according working year
        $insentif = 0;
        if ($status == 'permanent') {
            $insentif = 1000000 + $working_year * 100000;
        }

        // Calculate overtime
        $overtime_salary_per_hours = round($status == 'freelance' ? $basic_salary / 173 : ($basic_salary + $basic_allowance) / 173);

        $overtime_multiply = $overtime_hours_count;

        if ($overtime_hours_count > 4) {
            $overtime_multiply = 4 + ($overtime_hours_count - 4) * 2;
        }

        $overtime_salary = $overtime_salary_per_hours * $overtime_multiply;

        // Calculate NWNP
        $absent_count = $attendance['absent_days'];
        $nwnp = round(($absent_count * $basic_salary) / 30);

        // Calculate BPJS
        $bpjs = 0;

        if ($employee->insurance) {
            $bpjs = round(($basic_salary + $basic_allowance) * 0.03);
        }

        $amount_plus = $basic_salary + $basic_allowance + $insentif + $overtime_salary;
        $amount_min = $nwnp + $bpjs;
        $total = $amount_plus - $amount_min;

        // Total salary
        $salary = [
            'basic_salary' => $basic_salary,
            'basic_allowance' => $basic_allowance,
            'insentif' => $insentif,
            'overtime_salary' => [$overtime_salary, $overtime_multiply > 0 ? ($overtime_multiply == 1 ? $overtime_multiply . ' Hour' : $overtime_hours_count . ' Hours') : ''],
            'nwnp' => [$nwnp, $absent_count > 0 ? '( ' . ($absent_count == 1 ? $absent_count . ' Day' : $absent_count . ' Days') . ' )' : ''],
            'bpjs' => $bpjs,
            'amount_plus' => $amount_plus,
            'amount_min' => $amount_min,
            'total' => $total,
        ];

        return $salary;
    }
}
