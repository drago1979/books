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

/*
|--------------------------------------------------------------------------
| App Default Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Additional Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/files/create', [\App\Http\Controllers\FileController::class, 'create']);
    Route::post('/files', [\App\Http\Controllers\FileController::class, 'store'])->name('store_file');
});


//Route::get('/files/create', [\App\Http\Controllers\FileController::class, 'create']);
//Route::post('/files', [\App\Http\Controllers\FileController::class, 'store'])->name('store_file');



require __DIR__.'/auth.php';
