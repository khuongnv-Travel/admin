<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\DashboardController;
use Modules\Backend\Controllers\ListController;
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
        Route::prefix('listtype')->group(function(){
            Route::get('', [ListtypeController::class, 'index']);
            Route::post('loadList', [ListtypeController::class, 'loadList']);
            Route::post('create', [ListtypeController::class, 'create']);
            Route::post('edit', [ListtypeController::class, 'edit']);
            Route::post('update', [ListtypeController::class, 'update']);
            Route::post('delete', [ListtypeController::class, 'delete']);
            Route::post('changeStatus', [ListtypeController::class, 'changeStatus']);
            Route::post('updateOrderTable', [ListtypeController::class, 'updateOrderTable']);
        });
        Route::prefix('list')->group(function(){
            Route::get('', [ListController::class, 'index']);
            Route::post('loadList', [ListController::class, 'loadList']);
            Route::post('create', [ListController::class, 'create']);
            Route::post('edit', [ListController::class, 'edit']);
            Route::post('update', [ListController::class, 'update']);
            Route::post('delete', [ListController::class, 'delete']);
            Route::post('changeStatus', [ListController::class, 'changeStatus']);
            Route::post('updateOrderTable', [ListController::class, 'updateOrderTable']);
        });
    });
});
