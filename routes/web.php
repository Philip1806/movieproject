<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies', [App\Http\Controllers\HomeController::class, 'movies'])->name('home.movies');
Route::get('/movies/{slug}', [App\Http\Controllers\HomeController::class, 'moviesShow'])->name('home.movies.show');
Route::get('/movies/genre/{slug}', [App\Http\Controllers\HomeController::class, 'genre'])->name('home.movies.genre');
Route::get('/actors', [App\Http\Controllers\HomeController::class, 'actors'])->name('home.actors.index');
Route::get('/actors/{slug}', [App\Http\Controllers\HomeController::class, 'actorsShow'])->name('home.actors.show');

Auth::routes();


Route::group(
    [
        'prefix'     => 'panel',
        'middleware' => 'auth',
    ],
    static function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('panel.index');
        Route::resource('/movies', App\Http\Controllers\MoviesController::class)->only([
            'index', 'edit', 'store', 'update', 'create', 'destroy'
        ]);
        Route::get('/directors', [App\Http\Controllers\DirectorsController::class, 'index'])->name('panel.directors.index');
        Route::get('/cast', [App\Http\Controllers\ActorsController::class, 'index'])->name('panel.cast.index');
        Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('panel.categories.index');
    }
);
