<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
        return view('dashboard.employee', ['employees' => $employees]);
    }
}
