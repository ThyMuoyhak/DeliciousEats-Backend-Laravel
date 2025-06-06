<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\SlideHeroController;
use Illuminate\Support\Facades\Route;

// User API Routes
Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::post('/add-user', [AuthController::class, 'addUser']);
Route::delete('/delete-user/{id}', [AuthController::class, 'deleteUser']);
Route::put('/update-user/{id}', [AuthController::class, 'updateUser']);

// Category API Routes
Route::get('/categories', [CategoryController::class, 'indexApi'])->name('api.categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'showApi'])->name('api.categories.show');
Route::put('/categories/{id}', [CategoryController::class, 'updateApi'])->name('api.categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroyApi'])->name('api.categories.destroy');

// Product API Routes
Route::get('/products', [ProductController::class, 'indexApi'])->name('api.products.index');
Route::get('/products/{id}', [ProductController::class, 'showApi'])->name('api.products.show');
Route::put('/products/{id}', [ProductController::class, 'updateApi'])->name('api.products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroyApi'])->name('api.products.destroy');

// SlideHero API Routes - Fixed and Complete
Route::get('/slide-heroes', [SlideHeroController::class, 'indexApi'])->name('api.slide-heroes.index');
Route::post('/slide-heroes', [SlideHeroController::class, 'storeApi'])->name('api.slide-heroes.store');
Route::get('/slide-heroes/active/list', [SlideHeroController::class, 'activeApi'])->name('api.slide-heroes.active');
Route::post('/slide-heroes/bulk-delete', [SlideHeroController::class, 'bulkDeleteApi'])->name('api.slide-heroes.bulk-delete');
Route::get('/slide-heroes/{id}', [SlideHeroController::class, 'showApi'])->name('api.slide-heroes.show');
Route::put('/slide-heroes/{id}', [SlideHeroController::class, 'updateApi'])->name('api.slide-heroes.update');
Route::delete('/slide-heroes/{id}', [SlideHeroController::class, 'destroyApi'])->name('api.slide-heroes.destroy');
Route::patch('/slide-heroes/{id}/toggle-status', [SlideHeroController::class, 'toggleStatusApi'])->name('api.slide-heroes.toggle-status');