<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

// Halaman utama (misalnya redirect ke signin)
Route::get('/', function () {
    return redirect()->route('signin');
});

// ----------------------------
// Auth Routes (Sign In & Sign Up)
// ----------------------------
Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin.auth');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------
// Task Routes (CRUD) - Dilindungi auth
// ----------------------------
Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
    Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/tasks/{id}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
});
