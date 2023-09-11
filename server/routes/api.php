<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultMessageController;
use App\Http\Controllers\ElectionRecordController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentController;
use App\Models\DefaultMessage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
r
*/

Route::middleware(['auth'])->get('/user/info', function (Request $request) {
    return $request->user();
});

Route::prefix('api')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('account/info', function (Request $request) {
            return $request->user();
        });
        Route::post('account/logout', [
            StudentAccountController::class,
            'logout'
        ]);

        Route::controller(
            ElectionRecordController::class
        )->prefix('election')
        ->group(function () {
            Route::post('code', 'apiHandleAccessCode');
            Route::post('vote', 'apiVote');
            Route::post('process', 'processVoteCode');
            Route::post('count', 'declareWinners');
        });
    });

    Route::controller(
        StudentAccountController::class
    )->prefix('account')
    ->group(function () {
        Route::post('/', 'store');
        Route::post('login', 'login');
        Route::post('register', 'store');
    });

    Route::controller(
        ElectionRecordController::class
    )->prefix('election')
    ->group(function () {
        Route::get('/', 'apiGetActiveElection');
        Route::get('results', 'apiGetResults');
    });

    Route::controller(
        StudentController::class
    )->prefix('student')
    ->group(function () {
        Route::get('{student}/candidates', 'apiGetCandidates');
    });

    Route::get(
        'announcement',
        [AnnouncementController::class, 'apiAnnouncement'],
    )->name('api.announcement');

    Route::get(
        'message/{default_message}',
        [DefaultMessageController::class, function(DefaultMessage $defaultMessage) {
            return $defaultMessage->value;
        }],
    );
});

Route::resource('auth/student', StudentAccountController::class);
Route::controller(StudentAccountController::class)
    ->prefix('auth/student')
    ->group(function () {
        Route::post('login', 'login');
        Route::post('logout', 'logout');
    });