<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Overtime;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class OvertimeController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $overtimes = Overtime::oldest()->get();
        $employees = Employee::oldest()->get();

        return view('dashboard.overtime', ['overtimes' => $overtimes, 'employees' => $employees]);
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
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'employee_id' => 'required|numeric',
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

        Overtime::firstOrCreate(['id' => $request->id], $data);

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'Overtime data successfully added',
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
        $overtime = Overtime::where('id', decrypt($id))->first();

        if (empty($overtime)) {
            return redirect()
                ->back()
                ->with('message', [
                    'title' => 'Error',
                    'type' => 'error',
                    'msg' => 'Overtime data not found',
                ]);
        }

        $overtime->delete();

        return redirect()
            ->back()
            ->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'Overtime data successfully deleted',
            ]);
    }
}
