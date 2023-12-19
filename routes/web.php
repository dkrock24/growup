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

Route::get('/user/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('createUser');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employees', App\Http\Controllers\EmployeeController::class);

 # Users

 Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');

//Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
//Route::get('/employee/new', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees/new');
