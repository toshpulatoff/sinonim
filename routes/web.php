<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\WordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/words/create', [WordController::class, 'create'])->name('words.create');
Route::post('/words', [WordController::class, 'store'])->name('words.store');
Route::get('/words/{id}', [WordController::class, 'show'])->name('words.show');
Route::post('/words/{id}/increment', [WordController::class, 'incrementRequests'])->name('words.incrementRequests');

Route::get('/letters/{id}', [LetterController::class, 'show'])->name('letters.show');
