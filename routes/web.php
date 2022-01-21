<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::post('student', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
Route::delete('student/{id}/delete', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
