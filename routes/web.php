<?php

use App\Http\Controllers\MailController;
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

Route::get('/user/register', [App\Http\Controllers\CustomerRegisterController::class, 'register']);
Route::post('/user/create', [App\Http\Controllers\CustomerRegisterController::class, 'create'])->name('createUser');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::post('jobs/add_service_employee', [App\Http\Controllers\JobsController::class, 'add_service_employee']);
Route::get('jobs/remove_service_employee/{id}', [App\Http\Controllers\JobsController::class, 'remove_service_employee']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::resource('catalog', App\Http\Controllers\CatalogController::class);
Route::resource('customers', App\Http\Controllers\CustomerController::class);
Route::resource('services', App\Http\Controllers\ServicesController::class);
Route::resource('jobs', App\Http\Controllers\JobsController::class);
 # Users

//Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
//Route::get('/employee/new', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees/new');

Route::get('sendbasicemail',[MailController::class, 'basic_email']);
//Route::get('sendhtmlemail','MailController@html_email');
//Route::get('sendattachmentemail','MailController@attachment_email');