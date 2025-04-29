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
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category Routes
   // Category Routes
Route::resource('categories', CategoryController::class);
Route::get('/categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
Route::get('/categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
Route::put('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    // Product Routes
    Route::resource('products', ProductController::class)->middleware('auth');

    // Employee Routes
    Route::resource('employees', EmployeeController::class);

    // Project Routes
    Route::resource('projects', ProjectController::class)->except(['show']);

    // Message Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

    // Report Routes
    Route::resource('reports', ReportController::class);

    // Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Home Route (Redirect to Products)
    Route::get('/home', function () {
        return redirect()->route('products.index');
    })->name('home');
});