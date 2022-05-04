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


//-----------------------------------------------------
// Laravel Breeze
//-----------------------------------------------------

require __DIR__ . '/auth.php';

//-----------------------------------------------------
// Resources
//-----------------------------------------------------

Route::get('/files/create', [\App\Http\Controllers\FileController::class, 'create'])
    ->middleware('auth')
    ->middleware('can:file-upload')
    ->name('upload_file');

Route::post('/files', [\App\Http\Controllers\FileController::class, 'store'])
    ->middleware('auth')
    ->middleware('can:file-upload')
    ->name('store_file');
