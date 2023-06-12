<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ComelecUserController;
use App\Http\Controllers\ElectionRecordController;
use App\Http\Controllers\MasterlistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RecordCandidateController;
use App\Http\Controllers\RecordStudentController;
use App\Http\Controllers\StudentAccountController;
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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
Route::middleware(['auth'])->get('/user/info', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('register', 'register')->name('register');
        // Route::post('login', 'login')->name('login');
        Route::post('token', 'getToken')->name('token');
    });

Route::controller(MasterlistController::class)
    ->prefix('masterlist')
    ->group(function () {
        Route::post('upload', 'upload');
        Route::get('test/{student:student_id}', 'testMasterlist');
    });

Route::resource('student', StudentController::class);

Route::resource('auth/student', StudentAccountController::class);
Route::controller(StudentAccountController::class)
    ->prefix('auth/student')
    ->group(function () {
        Route::post('login', 'login');
        Route::post('logout', 'logout');
    });

Route::resource('auth/comelec', ComelecUserController::class);
Route::controller(ComelecUserController::class)
    ->prefix('auth/comelec')
    ->group(function () {
        Route::post('login', 'login');
        Route::post('logout', 'logout');
    });

Route::resource('record', ElectionRecordController::class);

Route::resource('candidate', CandidateController::class);

Route::resource('position', PositionController::class);

Route::resource('recordstudent', RecordStudentController::class);
Route::controller(RecordStudentController::class)
    ->prefix('recordstudent')
    ->group(function () {
        Route::patch('update', 'updateByIds');
        Route::post('qr', 'getAccessCodeQrPost');
    });

Route::resource('recordcandidate', RecordCandidateController::class);