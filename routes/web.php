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
    }
);
