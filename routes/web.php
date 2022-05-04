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


// Accessible only by admin-level user
Route::group([
    'middleware' => 'auth',
    'controller' => \App\Http\Controllers\FileController::class
], function () {
    Route::get('/files/create', 'create')->name('upload_file');
    Route::post('/files', 'store')->name('store_file');
});


