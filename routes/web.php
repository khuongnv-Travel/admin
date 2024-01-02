<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Controllers\AuthorController;
use Modules\Backend\Controllers\BlogsController;
use Modules\Backend\Controllers\CategoriesController;
use Modules\Backend\Controllers\DashboardController;
use Modules\Backend\Controllers\ListController;
use Modules\Backend\Controllers\ListtypeController;
use Modules\Backend\Controllers\SupportController;

Route::prefix('/')->group(function(){
    // Dashboard
    Route::prefix('/')->group(function(){
        Route::get('', [DashboardController::class, 'index']);
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
    // Danh sách danh mục
    Route::prefix('listtype')->group(function(){
        // Danh mục
        Route::prefix('listtype')->group(function(){
            Route::get('/', [ListtypeController::class, 'index']);
            Route::get('loadList', [ListtypeController::class, 'loadList']);
            Route::get('create', [ListtypeController::class, 'create']);
            Route::get('edit', [ListtypeController::class, 'edit']);
            Route::post('update', [ListtypeController::class, 'update']);
            Route::post('delete', [ListtypeController::class, 'delete']);
            Route::post('updateOrderTable', [ListtypeController::class, 'updateOrderTable']);
            Route::post('changeStatus', [ListtypeController::class, 'changeStatus']);
        });
        // Danh mục đối tượng
        Route::prefix('list')->group(function(){
            Route::get('/', [ListController::class, 'index']);
            Route::get('loadList', [ListController::class, 'loadList']);
            Route::post('create', [ListController::class, 'create']);
            Route::get('edit', [ListController::class, 'edit']);
            Route::post('update', [ListController::class, 'update']);
            Route::post('delete', [ListController::class, 'delete']);
            Route::post('updateOrderTable', [ListController::class, 'updateOrderTable']);
            Route::post('changeStatus', [ListController::class, 'changeStatus']); 
        });
    });
    // Chuyên mục
    Route::prefix('categories')->group(function(){
        Route::get('', [CategoriesController::class, 'index']);
        Route::get('loadList', [CategoriesController::class, 'loadList']);
        Route::get('create', [CategoriesController::class, 'create']);
        Route::get('edit', [CategoriesController::class, 'edit']);
        Route::post('update', [CategoriesController::class, 'update']);
        Route::get('addList', [CategoriesController::class, 'addList']);
        Route::post('updateList', [CategoriesController::class, 'updateList']);
        Route::get('addListtype', [CategoriesController::class, 'addListtype']);
        Route::post('updateListtype', [CategoriesController::class, 'updateListtype']);
        Route::get('refresh', [CategoriesController::class, 'refresh']);
        Route::post('delete', [CategoriesController::class, 'delete']);
        Route::post('updateOrderTable', [CategoriesController::class, 'updateOrderTable']);
        Route::post('changeStatus', [CategoriesController::class, 'changeStatus']);
    });
    // Tác giả
    Route::prefix('authors')->group(function(){
        Route::get('', [AuthorController::class, 'index']);
        Route::get('loadList', [AuthorController::class, 'loadList']);
        Route::get('create', [AuthorController::class, 'create']);
        Route::get('edit', [AuthorController::class, 'edit']);
        Route::post('update', [AuthorController::class, 'update']);
        Route::post('delete', [AuthorController::class, 'delete']);
        Route::post('updateOrderTable', [AuthorController::class, 'updateOrderTable']);
        Route::post('changeStatus', [AuthorController::class, 'changeStatus']);
    });
    // Bài viết
    Route::prefix('blogs')->group(function(){
        Route::get('', [BlogsController::class, 'index']);
        Route::get('loadList', [BlogsController::class, 'loadList']);
        Route::get('create', [BlogsController::class, 'create']);
        Route::get('edit', [BlogsController::class, 'edit']);
        Route::post('update', [BlogsController::class, 'update']);
        Route::post('delete', [BlogsController::class, 'delete']);
        Route::post('updateOrderTable', [BlogsController::class, 'updateOrderTable']);
        Route::post('changeStatus', [BlogsController::class, 'changeStatus']);
        Route::post('uploadFile', [BlogsController::class, 'uploadFile']);
    });
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    // Route::prefix('')->group(function(){});
    Route::prefix('support')->group(function(){
        Route::get('/', [SupportController::class, 'index']);
        Route::post('updateData', [SupportController::class, 'updateData']); 
    });
});
