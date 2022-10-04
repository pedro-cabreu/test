<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BookController;
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

Route::group(['prefix' => '/books', 'middleware' => 'auth'], function(){

    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::put('/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/delete', [BookController::class, 'delete'])->name('books.delete');
});

Route::get('/dashboard', function () {



    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
