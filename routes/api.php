<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| App Default Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Additional Routes
|--------------------------------------------------------------------------
*/

Route::post('auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group([
    'middleware' => 'auth:sanctum',
    'controller' => \App\Http\Controllers\BookController::class
    ], function () {
    Route::get('/books', 'index');
    Route::get('/books/{book}', 'show');
});
