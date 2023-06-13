<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ComelecUserController;
use App\Http\Controllers\ElectionRecordController;
use App\Http\Controllers\MasterlistController;
use App\Http\Controllers\PositionController;
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

Route::get('/', fn () => view('auth.login'))
    ->name('login');

Route::prefix('user')
    ->group(function () {
        Route::post('login', [ComelecUserController::class, 'login']);
    });

Route::middleware('auth:comelec_user')->group(function () {
    Route::middleware('roles:s,a,m,c')
        ->controller(MasterlistController::class)
        ->prefix('master-list')
        ->group(function () {
            Route::get('/', 'index')
                ->name('master-list.index');
            Route::get('create', 'create')
                ->name('master-list.create');
            Route::get('edit/{student:student_id}', 'edit')
                ->name('master-list.edit');
            Route::post('upload', 'upload')
                ->name('master-list.upload');
        });

    Route::middleware('roles:s,a,c')
        ->resource(
            'election',
            ElectionRecordController::class,
        )->except(['create', 'show']);
    Route::middleware('roles:s,a')
        ->controller(ElectionRecordController::class)
        ->prefix('election')
        ->group(function () {
            Route::get('create', 'create')->name('election.create');
            Route::get('search', 'search')
                ->name('election.search');
        });

    Route::middleware('roles:s,a,c')
        ->resource(
            'candidates',
            CandidateController::class,
        );
    
    Route::middleware('roles:s,a')
        ->resource(
            'positions',
            PositionController::class,
        )->except(['show']);
    Route::middleware('roles:s,a')
        ->controller(PositionController::class)
        ->prefix('positions')
        ->group(function () {
            Route::get('search', 'search')
                ->name('positions.search');
        });
});