<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseProgramController;
use App\Http\Controllers\ProgramController;
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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('program', [ProgramController::class, 'index']);
Route::post('program', [ProgramController::class, 'store']);
Route::get('program/{id}', [ProgramController::class, 'getById']);


Route::get('course', [CourseController::class, 'index']);
Route::post('course', [CourseController::class, 'store']);
Route::get('course/{id}', [CourseController::class, 'getById']);


Route::post('courseprogram', [CourseProgramController::class, 'store']);





