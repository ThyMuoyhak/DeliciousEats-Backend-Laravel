<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

// Route to display the employee list
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// Route to show the form
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// Route to handle form submission
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// project

// Route to display the projects list
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Route to show the form for adding a new project
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

// Route to handle form submission
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

// messages
// Route to display the messages list
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

// Route to show the form for composing a new message
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');

// Route to handle form submission
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');