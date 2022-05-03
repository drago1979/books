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

require __DIR__.'/auth.php';

Route::group([
    ['middleware' => ['auth', 'can:file-upload']]
], function () {
    Route::get('/files/create', [\App\Http\Controllers\FileController::class, 'create'])->name('upload_file');
    Route::post('/files', [\App\Http\Controllers\FileController::class, 'store'])->name('store_file');
});
