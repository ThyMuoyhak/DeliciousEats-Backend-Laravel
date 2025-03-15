<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BackupController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

// Edit employee route
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

// Update employee route
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');


Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');





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

// Edit Project
Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');

// Update Project
Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
// Delete Project
Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');



// messages
// Route to display the messages list
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

// Route to show the form for composing a new message
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');

// Route to handle form submission
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// Reports

// Route to display the reports list
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// Route to show the form for generating a new report
Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');

// Route to handle form submission
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

// Show a specific report
Route::get('reports/{report}', [ReportController::class, 'show'])->name('reports.show');

// Edit a specific report
Route::get('reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');

// Update a specific report
Route::put('reports/{report}', [ReportController::class, 'update'])->name('reports.update');

// Delete a specific report
Route::delete('reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');


// Setting

// Route to update settings
// Route to display the settings page (GET)
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');

// Route to handle form submission (PUT)
Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

Route::get('develop', function() {
    return view('develop.index');
});
