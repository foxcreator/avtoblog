<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->middleware('role:admin|writer')->name('admin.')->group(function () {
    Route::get('/sitemap', [\App\Http\Controllers\HomeController::class, 'sitemap'])->name('sitemap');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
});

Route::prefix('admin')->middleware('role:admin')->name('admin.')->group(function () {
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.all');
    Route::get('/users/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
});



