<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;

Route::get('/tasks', [TaskController::class, 'index']); 
Route::post('/tasks', [taskController::class, 'store']); 
Route::get('/tasks/{task}', [taskController::class, 'show']); 
Route::put('/tasks/{task}', [TaskController::class, 'update']); 
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

Route::get('/tasks/{task}/subtasks', [SubtaskController::class, 'index']);
Route::post('/tasks/{task}/subtasks', [SubtaskController::class, 'store']); 
Route::get('/subtasks/{subtask}', [SubtaskController::class, 'show']); 
Route::put('/subtasks/{subtask}', [SubtaskController::class, 'update']); 
Route::delete('/subtasks/{subtask}', [SubtaskController::class, 'destroy']); 
