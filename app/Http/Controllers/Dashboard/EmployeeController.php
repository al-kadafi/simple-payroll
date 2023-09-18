<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Slip;
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
        $employees = Employee::latest()->get();

        return view('dashboard.employee', ['employees' => $employees]);
    }

    /**
     * show employee
     *
     * @param  mixed $request
     * @return void
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('dashboard.profile', ['employee' => $employee]);
    }

    /**
     * store overtime data
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'status' => 'required',
            'basic_salary' => 'required',
            'allowance' => 'required',
            'join_date' => 'required',
            'insurance' => 'required',
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

        $data = $request->except('_token', 'id');

        Employee::updateOrCreate(['id' => $request->id], $data);

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'Employee data successfully ' . ($request->id ? 'edited' : 'added'),
            ]);
    }

    /**
     * delete overtime data
     *
     * @param  mixed $request
     * @return void
     */
    public function delete($id)
    {
        $employee = Employee::where('id', decrypt($id))->first();

        if (empty($employee)) {
            return redirect()
                ->back()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => 'Employee data not found',
                ]);
        }

        //delete user and related data (failed when use cascade on migration, so delete manually)
        $employee->delete();
        $employee->slip()->delete();
        $employee->overtime()->delete();
        $employee->attendance()->delete();

        return redirect()
            ->route('employee')
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'Employee data successfully deleted',
            ]);
    }
}
