<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\DashboardController;
use Modules\Backend\Controllers\ListtypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function(){
    // Dashboard
    Route::prefix('/')->group(function(){
        Route::get('', [DashboardController::class, 'index']);
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
    Route::prefix('listtype')->group(function(){
        Route::get('listtype', [ListtypeController::class, 'index']);
    });
});
