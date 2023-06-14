<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ComelecUserController;
use App\Http\Controllers\DefaultMessageController;
use App\Http\Controllers\ElectionRecordController;
use App\Http\Controllers\MasterlistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RecordStudentController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentController;
use App\Models\DefaultMessage;
use App\Models\Student;
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
            Route::get('search', 'search')
                ->name('master-list.search');
            Route::get('export', 'exportCsv')
                ->name('master-list.export');
        });
    Route::middleware('roles:s,a,m,c')
        ->resource(
            'students',
            StudentController::class
        )->only(['store', 'update']);

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
        )->except(['show']);
    Route::middleware('roles:s,a,c')
        ->controller(CandidateController::class)
        ->prefix('candidates')
        ->group(function () {
            Route::post('destroy-all', 'archiveAll')
                ->name('candidates.destroy-all');
            Route::get('archive', 'archive')
                ->name('candidates.archive');
            Route::get('search', 'search')
                ->name('candidates.search');
            Route::get('archive/search', 'searchArchive')
                ->name('candidates.search-archive');
        });
    
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

    Route::middleware('roles:s,a,c')
        ->resource(
            'announcements',
            AnnouncementController::class,
        )->only(['index', 'update']);
    
    Route::middleware('roles:s,a,c')
        ->resource(
            'message-editor',
            DefaultMessageController::class,
        )->only(['index']);
    Route::middleware('roles:s,a,c')
        ->controller(DefaultMessageController::class)
        ->prefix('message-editor')
        ->group(function () {
            Route::post('update', 'update')
                ->name('message-editor.update');
        });

    Route::middleware('roles:s,a,m')
        ->resource(
            'student-accounts',
            StudentAccountController::class,
        )->except(['show']);
    Route::middleware('roles:s,a,m')
        ->controller(StudentAccountController::class)
        ->prefix('student-accounts')
        ->group(function () {
            Route::post('verify/{student_account}', 'verify')
                ->name('student-accounts.verify');
            Route::get('search', 'search')
                ->name('student-accounts.search');
        });

    Route::middleware('roles:p,s')
        ->controller(RecordStudentController::class)
        ->prefix('access-code')
        ->group(function () {
            Route::get('/', 'index')
                ->name('access-code.index');
            Route::post('/', 'getAccessCode')
                ->name('access-code.code');
        });

    Route::middleware('roles:p,m,c,s,a')
        ->controller(ComelecUserController::class)
        ->prefix('account')
        ->group(function () {
            Route::get('/', 'viewProfile')
                ->name('account.profile');
            Route::match(['PUT', 'PATCH'], '/', 'update')
                ->name('account.update');
            Route::delete('/', 'destroy')
                ->name('account.destroy');
        });
    Route::middleware('roles:s,a')
        ->controller(ComelecUserController::class)
        ->prefix('account/admin')
        ->group(function () {
            Route::get('/', 'viewAdmin')
                ->name('account.admin.index');
            Route::get('create', 'create')
                ->name('account.admin.create');
            Route::post('store', 'store')
                ->name('account.admin.store');
            Route::get('{comelec_user}/edit', 'edit')
                ->name('account.admin.edit');
            Route::match(['PUT', 'PATCH'], '{comelec_user}', 'update')
                ->name('account.admin.update');
        });
});