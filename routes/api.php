 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;

    Route::prefix('tasks')->group((function () {
        Route::get('/tasks/subtasks', [TaskController::class, 'index']);
        Route::post('/tasks/subtasks', [taskController::class, 'store']);
        Route::get('/tasks/{task}/subtasks', [taskController::class, 'show']);
        Route::put('/tasks/{task}/subtasks/{subtask}', [TaskController::class, 'update']);
        Route::delete('/tasks/{task}/subtasks/{subtask}', [TaskController::class, 'destroy']);
    }));

    Route::prefix('subtasks')->group((function(){
        Route::get('/tasks/{task}/subtasks', [SubtaskController::class, 'index']);
        Route::post('/tasks/{task}/subtasks', [SubtaskController::class, 'store']); 
        Route::get('/subtasks/{subtask}', [SubtaskController::class, 'show']); 
        Route::put('/subtasks/{subtask}', [SubtaskController::class, 'update']); 
        Route::delete('/subtasks/{subtask}', [SubtaskController::class, 'destroy']); 
    }));


