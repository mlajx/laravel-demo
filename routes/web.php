<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/posts/create',     [PostController::class, 'create'])->middleware(['auth'])->name('posts.create');
Route::get('/posts/{id}',       [PostController::class, 'show'])->name('posts.show');
Route::post('/posts',           [PostController::class, 'post'])->middleware(['auth'])->name('posts.post');
Route::get('/posts/{id}/edit',  [PostController::class, 'edit'])->middleware(['auth'])->name('posts.edit');
Route::put('/posts/{id}',       [PostController::class, 'update'])->middleware(['auth'])->name('posts.update');
Route::delete('/posts/{id}',    [PostController::class, 'destroy'])->middleware(['auth'])->name('posts.destroy');

require __DIR__.'/auth.php';
