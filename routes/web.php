<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

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

Route::get('/',[crudController::class,'index'])->name('home');
Route::get('/add-employee-form',[crudController::class,'viewEmployeeAddForm'])->name('viewEmployeeAddForm');
Route::post('/add-employee-form',[crudController::class,'addEmployee'])->name('addEmployee');
Route::get('/delete-employee/{id}',[crudController::class,'deleteEmployee'])->name('deleteEmployee');
Route::post('/edit-employee/{id}',[crudController::class,'updateEmployee'])->name('updateEmployee');
Route::get('/edit-employee/{id}',[crudController::class,'editEmployee'])->name('editEmployee');
// Route::post('/',[crudController::class,'addEmployee'])->name('addEmployee');

// Route::get('/crud',function(){
//     return view('index');
// });