<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FollowsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::post('follow/{id}', [FollowsController::class, 'store']);

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

route::group(['prefix' => 'profile'], function() {
    Route::get('/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/{user}/update', [ProfileController::class, 'update'])->name('profile.update');
});

route::group(['prefix' => 'post'], function() {
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::get('/delete/{post}', [PostController::class, 'delete'])->name('post.delete');
});

route::group(['prefix' => 'comment'], function() {
    Route::post('/store/p-id={post}', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/{user}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/{user}/update', [ProfileController::class, 'update'])->name('profile.update');
});
