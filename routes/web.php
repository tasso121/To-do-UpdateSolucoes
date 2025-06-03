<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);
// Rota extra para restaurar (soft deleted)
Route::post('tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
