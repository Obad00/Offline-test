<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);
Route::put('tasks/{operation_id}', [TaskController::class, 'update']);
Route::delete('tasks/{operation_id}', [TaskController::class, 'destroy']);

// Route::apiResource('tasks', TaskController::class);

