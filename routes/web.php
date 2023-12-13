<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
//Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
//Route::get('/employee/new', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees/new');
