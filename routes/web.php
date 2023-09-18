<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AttendanceController;
use App\Http\Controllers\Dashboard\SlipController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\OvertimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//basic route
Route::get('/', [LoginController::class, 'index'])->name('home');
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

//auth route
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:staff']], function () {
        //overtime route
        Route::get('/overtime', [OvertimeController::class, 'index'])->name('overtime');
        Route::post('/overtime/{id}', [OvertimeController::class, 'store'])->name('overtime.store');
        Route::get('/overtime/delete/{id}', [OvertimeController::class, 'delete'])->name('overtime.delete');

        //salary route
        Route::get('/salary/slip/generate', [SlipController::class, 'generate'])->name('slip.generate');

        //employee route
        Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
        Route::post('/employee/{id}', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');

        //attendance route
        Route::get('/attendance', [AttendanceController::class, 'list'])->name('attendance.list');
    });

    //general salary route
    Route::get('/salary', [SlipController::class, 'index'])->name('salary');
    Route::get('/salary/slip/{id}', [SlipController::class, 'show'])->name('salary.slip');
    Route::get('/salary/slip/update/{id}/{status}', [SlipController::class, 'update'])->name('slip.update');
});
