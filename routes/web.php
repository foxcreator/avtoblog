<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/auth/redirect', [\App\Http\Controllers\Front\SocialiteController::class, 'googleRedirect'])
    ->name('google.auth');
Route::get('/auth/google/callback', [\App\Http\Controllers\Front\SocialiteController::class, 'googleCallback']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/front/article/{id}', [App\Http\Controllers\HomeController::class, 'showPost'])->name('show.article');
Route::get('/front/category/{id}', [App\Http\Controllers\HomeController::class, 'articlesInCategory'])->name('category.post');
Route::get('/front/categories', [App\Http\Controllers\HomeController::class, 'categories'])->name('categories.all');
Auth::routes();

Route::post('/create-comment', [App\Http\Controllers\Front\CommentsController::class, 'store'])->name('comment.store');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

});



