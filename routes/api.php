<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('student', [App\Http\Controllers\Api\StudentController::class, 'index']);
Route::post('student', [App\Http\Controllers\Api\StudentController::class, 'create']);
Route::post('student/{id}', [App\Http\Controllers\Api\StudentController::class, 'change']);
Route::delete('student/{id}', [App\Http\Controllers\Api\StudentController::class, 'destroy']);
