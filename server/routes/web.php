<?php

use App\Http\Controllers\ComelecUserController;
use App\Http\Controllers\MasterlistController;
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
        ->resource('master-list', MasterlistController::class);
    // Route::resources([
    //     'masterlist' => MasterlistController::class,
    // ]);
});

// Route::controller(MasterlistController::class)
//     ->prefix('master-list')
//     ->group(function () {
//         Route::get('/', 'index');
//     });