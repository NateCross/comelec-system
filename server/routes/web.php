<?php

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

Route::get('/', fn () => view('auth.login'));

// Route::middleware();

Route::controller(MasterlistController::class)
    ->prefix('master-list')
    ->group(function () {
        Route::get('/', 'index');
    });