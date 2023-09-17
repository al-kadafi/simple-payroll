<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;

class SlipController extends Controller
{
    /**
     * update slip status
     *
     * @param  mixed $request
     * @return void
     */
    public function update(Request $request)
    {
        $employees = Employee::oldest()->get();
        // return view('dashboard.salary', ['employees' => $employees]);
    }
}
