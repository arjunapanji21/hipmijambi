<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('articles')->group(function () {
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
            Route::post('/create/draft', [PostController::class, 'create_draft'])->name('admin.posts.create.draft');
            Route::post('/create/publish', [PostController::class, 'create_publish'])->name('admin.posts.create.publish');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        });
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/trash', [UserController::class, 'trash'])->name('admin.user.trash');
    });
});
