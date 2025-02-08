<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    logger('get RegForm route');
    return view('RegForm');
});

//write data in database
logger('before create');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
logger('After create');
// fetch data from database
logger('before records');
Route::get('/employee/records',[EmployeeController::class, 'records'])->name('employee.records');

// delete data of specifice id
logger('before delete route');
Route::get('/employee/delete_records/{id}',[EmployeeController::class,'delete_records'])->name('employee.delete_records');
logger('After delete route');

// Update data of specifice id

// 1: Create a route to handle the update form
logger('Before get edit route');
Route::get('/employee/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
logger('After get edit route');

// 2: Route to update the data 
logger('Before put edit route');
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
logger('After put edit route');