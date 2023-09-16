<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'date' => 'required|string',
            'employee' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

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

        Attendance::create([
            'employee_id' => $request->employee,
            'date' => $request->date,
        ]);

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'Attendance successfully added',
            ]);
    }
}
