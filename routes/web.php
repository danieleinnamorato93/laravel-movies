<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function(){
    Route::get('/movies', [AdminMovieController::class, 'index'])->name('movies.index');
    Route::post('/movies', [AdminMovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/create', [AdminMovieController::class, 'create'])->name('movies.create');
    Route::get('/movies/{id}', [AdminMovieController::class, 'show'])->name('movies.show');
    Route::get("/movies/{id}/edit", [AdminMovieController::class, "edit"])->name("movies.edit");
    Route::put("/movies/{id}", [AdminMovieController::class, "update"])->name("movies.update");
    Route::delete("/movies/{id}", [AdminMovieController::class, "destroy"])->name("movies.delete");
});
