<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionRecordController;
use App\Http\Controllers\MasterlistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('register', 'register')->name('register');
        Route::post('login', 'login')->name('login');
        Route::post('token', 'getToken')->name('token');
    });

Route::controller(MasterlistController::class)
    ->prefix('masterlist')
    ->group(function () {
        Route::post('upload', 'upload');
        Route::get('test/{student:student_id}', 'testMasterlist');
    });

Route::resource('student', StudentController::class);

Route::resource('record', ElectionRecordController::class);

Route::resource('candidate', CandidateController::class);

Route::resource('position', PositionController::class);