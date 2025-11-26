<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;

Route::get('/', function () {
    return view('home');
});

// Auth
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/logout', [AuthController::class, 'logout']);

// User routes
Route::middleware('user')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    Route::resource('/user/complaints', ComplaintController::class);
});

// Admin routes
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/complaints', [AdminController::class, 'allComplaints']);
    Route::get('/admin/complaints/{id}/edit', [AdminController::class, 'editComplaint']);
    Route::post('/admin/complaints/{id}/update', [AdminController::class, 'updateComplaint']);
});
