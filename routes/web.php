<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('login');
});

Route::group(['prefix' => '/dashboard', 'middleware' => ['role:staff','role:employee']], function () {
    Route::get('/salary', [Controllers\SalaryController::class, 'index'])->name('salary');
    Route::get('/employee', [Controllers\SalaryController::class, 'index'])->name('employee');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
