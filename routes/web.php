<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

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
    return view('home');
})->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Category
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{category}',[CategoryController::class,'show'])->name('category.show');
Route::delete('/category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');

//Author
Route::get('/author',[AuthorController::class,'index'])->name('author');
Route::get('/author/create',[AuthorController::class,'create'])->name('author.create');
Route::post('/author',[AuthorController::class,'store'])->name('author.store');
Route::get('/author/{author}',[AuthorController::class,'show'])->name('author.show');

//Blog
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/{blog}',[BlogController::class,'show'])->name('blog.show');
Route::delete('/blog/{blog}',[BlogController::class,'destroy'])->name('blog.destroy');
Route::get('/blog/{blog}/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::put('/blog/{blog}',[BlogController::class,'update'])->name('blog.update');
