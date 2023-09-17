<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $employees = Employee::oldest()->get();
        return view('dashboard.salary', ['employees' => $employees]);
    }

    /**
     * show slip
     *
     * @param  mixed $request
     * @return void
     */
    public function show(Request $request)
    {
        $employee_id = $request->id;
        $date = $request->date;

        $employee = Employee::find($employee_id);

        if (empty($employee)) {
            return redirect()
                ->back()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => 'The employee data not found',
                ]);
        }

        return view('dashboard.slip', ['employee' => $employee]);
    }
}
