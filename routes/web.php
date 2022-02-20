<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NoteTagController;

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
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::prefix('note')->group(function () {
        Route::get('/', [NoteController::class, 'index'])->name('note.index');
        Route::get('/create', [NoteController::class, 'create'])->name('note.create');
        Route::get('/{id}', [NoteController::class, 'show'])->name('note.show');
        Route::post('/store', [NoteController::class, 'store'])->name('note.store');
        Route::get('/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
        Route::post('/{id}/update', [NoteController::class, 'update'])->name('note.update');
        Route::get('/{id}/delete', [NoteController::class, 'destroy'])->name('note.delete');
    });

    Route::prefix('note-tag')->group(function () {
        Route::get('/', [NoteTagController::class, 'index'])->name('noteTag.index');
        Route::post('/store', [NoteTagController::class, 'store'])->name('noteTag.store');
        Route::get('/delete/{id}', [NoteTagController::class, 'delete'])->name('noteTag.delete');
    });
});
