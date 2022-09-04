<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostCategorySubscriberController;
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

Route::get('/', [PostController::class, 'index']);
Route::resource('posts', PostController::class);
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::post('subscribe-to-newsletter', [PostCategorySubscriberController::class, 'subscribe'])->name('subscribe-to-newsletter');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('posts.create');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
