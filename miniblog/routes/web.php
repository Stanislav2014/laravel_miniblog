<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::get('/', function () {
    return redirect()->route('listPosts');
});
Route::group([
    'prefix' => 'posts',
    'namespace' => 'Posts',
], function () {
    Route::get('/', [PostController::class, 'index'])->name('listPosts');
    Route::get('/create', [PostController::class, 'create'])->name('createPost');
    Route::post('/store', [PostController::class, 'store'])->name('storePost');
    Route::get('/show/{id}', [PostController::class, 'show'])->name('showPost');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('editPost');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('updatePost');
    Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('destroyPost');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('listAdmin');
    // Просмотр пользователей
    Route::get('/show/{id}', [AdminController::class, 'index'])->name('showAdmin');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('editAdmin');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('updateAdmin');
    Route::delete('/destroy/{id}', [AdminController::class, 'delete'])->name('deleteAdmin');
    //change to post
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

Auth::routes(['verify' => true]);


