<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');

Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts/create/draft', [PostController::class, 'create_draft'])->name('admin.posts.create.draft');
Route::post('/admin/posts/create/publish', [PostController::class, 'create_publish'])->name('admin.posts.create.publish');