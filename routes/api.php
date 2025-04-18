<?php
use App\Http\Controllers\AuthController;

Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::post('/add-user', [AuthController::class, 'addUser']); 
Route::delete('/delete-user/{id}', [AuthController::class, 'deleteUser']); 
Route::put('/update-user/{id}', [AuthController::class, 'updateUser']); 
