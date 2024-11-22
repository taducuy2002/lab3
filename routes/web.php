<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[BookController::class, 'index'])->name('home');
Route::delete('/posts/delete/{id}', [BookController::class, 'destroy'])->name('destroy');
Route::get('/create', [BookController::class, 'create'])->name('create');
Route::post('/create', [BookController::class, 'store'])->name('store');
Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [BookController::class, 'update'])->name('update');

