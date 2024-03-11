<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\ApartmentController;
use Modules\Backend\Controllers\CarController;
use Modules\Backend\Controllers\DashboardController;
use Modules\Backend\Controllers\ListController;
use Modules\Backend\Controllers\ListtypeController;
use Modules\Backend\Controllers\ProvinceController;
use Modules\Backend\Controllers\RoomController;
use Modules\Backend\Controllers\SupportController;

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
    Route::prefix('/')->group(function() {
        Route::post('changeProvince', [ProvinceController::class, 'changeProvince']); // Thay đổi Quận/Huyện theo Tỉnh/Thành
        Route::post('changeDistrict', [ProvinceController::class, 'changeDistrict']); // Thay đổi Phường/Xã theo Quận/Huyện
    });
    // Dashboard
    Route::prefix('/')->group(function(){
        Route::get('', [DashboardController::class, 'index']);
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
    // Danh mục
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
            Route::post('changeUnit', [ListController::class, 'changeUnit']);
            Route::post('changeStatus', [ListController::class, 'changeStatus']);
            Route::post('updateOrderTable', [ListController::class, 'updateOrderTable']);
        });
    });
    // Căn hộ
    Route::prefix('apartments')->group(function(){
        Route::prefix('list')->group(function(){
            Route::get('', [ApartmentController::class, 'index']);
            Route::post('loadList', [ApartmentController::class, 'loadList']);
            Route::post('create', [ApartmentController::class, 'create']);
            Route::post('edit', [ApartmentController::class, 'edit']);
            Route::post('update', [ApartmentController::class, 'update']);
            Route::post('delete', [ApartmentController::class, 'delete']);
            Route::post('changeStatus', [ApartmentController::class, 'changeStatus']);
            Route::post('updateOrderTable', [ApartmentController::class, 'updateOrderTable']);
        });
        Route::prefix('rooms')->group(function(){
            Route::get('', [RoomController::class, 'index']);
            Route::post('loadList', [ListController::class, 'loadList']);
            Route::post('create', [ListController::class, 'create']);
            Route::post('edit', [ListController::class, 'edit']);
            Route::post('update', [ListController::class, 'update']);
            Route::post('delete', [ListController::class, 'delete']);
            Route::post('changeStatus', [ListController::class, 'changeStatus']);
            Route::post('updateOrderTable', [ListController::class, 'updateOrderTable']);
        });
    });
    // Quản trị xe
    Route::prefix('cars')->group(function (){
        Route::get('', [CarController::class, 'index']);
        Route::post('loadList', [CarController::class, 'loadList']);
    });
    // Hỗ trợ hệ thống
    Route::prefix('support')->group(function(){
        Route::get('/', [SupportController::class, 'index']);
        Route::post('updateData', [SupportController::class, 'updateData']);
        Route::post('updateFile', [SupportController::class, 'updateFile']);
    });
});
