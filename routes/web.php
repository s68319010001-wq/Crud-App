<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('index');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/posts', [PostController::class, 'store'])->name('store');
Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('delete');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/post-register', [AuthController::class, 'postRegister'])->name('post.register');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/admin', [AuthController::class, 'admin'])->name('admin');
});