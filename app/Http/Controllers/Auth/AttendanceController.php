<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $employees = Employee::all();
        return view('auth.attendance', ['employees' => $employees]);
    }

    /**
     * store attendance
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //initialize rule
        $rules = [
            'date' => 'required|string',
            'employee_id' => 'required|numeric',
            'type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        //check validation
        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $err) {
                $message = implode(', ', $err);
                break;
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => $message,
                ]);
        }

        $employee = Employee::find($request->employee_id);

        //check working year
        if ($request->type === 'leave' && $employee->working_year === 0) {
            return redirect()
                ->back()
                ->withInput()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => "Working duration from $employee->name less that 1 year",
                ]);
        }

        //get formated date
        $date = Carbon::createFromFormat('d F Y', $request->date)->format('Y-m-d');

        $exist = Attendance::where('date', $date)->first();

        //check is exist
        if (isset($exist)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => "$employee->name has been $request->type on $request->date",
                ]);
        }

        //save data
        Attendance::create($request->except('_token'));

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'Attendance successfully added',
            ]);
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function list(Request $request)
    {
        $employees = Employee::latest()->get();

        return view('dashboard.attendance', ['employees' => $employees]);
    }
}
