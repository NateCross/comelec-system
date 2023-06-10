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

// This file is empty since no web routes are used;
// views are defined in the folders 'client/' and 'mobile/'

Route::get('/', fn () => view('index'));

Route::controller(MasterlistController::class)
    ->prefix('masterlist')
    ->group(function () {
        Route::get('/', 'index');
    });