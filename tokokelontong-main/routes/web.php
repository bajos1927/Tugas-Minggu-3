<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware([])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', function () {

        if (session('role') === 'admin') {
            return view('dashboard', ['message' => 'Selamat datang admin']);
        }

        if (session('role') === 'user') {
            return view('dashboard', ['message' => 'Selamat datang. Role anda USER']);
        }

        return redirect()->route('login');

    })->name('dashboard');
});

Route::middleware('role:admin')->group(function () {

    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);

    Route::get('/admin', function () {
        return "Halo Admin! Halaman ini hanya untuk role admin.";
    })->name('admin.page');

});
