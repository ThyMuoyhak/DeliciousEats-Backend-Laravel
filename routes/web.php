<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\OrderController;

// Public Routes (No Authentication Required)
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('welcome');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Cart/Order Routes
    Route::get('/cart', [PurchaseController::class, 'index'])->name('cart.index');
    Route::get('/cart/{order}', [OrderController::class, 'show'])->name('cart.show');
    Route::get('/cart/create', [OrderController::class, 'create'])->name('cart.create');
    Route::post('/cart', [OrderController::class, 'store'])->name('cart.store');
    Route::get('/cart/{order}/edit', [OrderController::class, 'edit'])->name('cart.edit');
    Route::put('/cart/{order}', [OrderController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{order}', [OrderController::class, 'destroy'])->name('cart.destroy');

    // Category Routes
    Route::resource('categories', CategoryController::class);
    Route::get('/categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::get('/categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::put('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    // Other Resource Routes
    Route::resource('products', ProductController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('reports', ReportController::class);

    Route::get('/profile', function () {
    return view('develop.index');
});


    // Message Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

    // Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Home Redirect
    Route::get('/home', function () {
        return redirect()->route('products.index');
    })->name('home');
});