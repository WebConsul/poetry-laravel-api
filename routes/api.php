<?php

use App\Http\Controllers\PoetController;
use App\Http\Controllers\PoetPoemController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return ['name' => env('APP_NAME')];
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/me', [UserController::class, 'me']);
});

Route::controller(PoetController::class)->group(function () {
    Route::get('/poets/{slug}', 'show')->name('poet.show');
    Route::get('/poets', 'getPoets');
});

Route::resource('poets.poems', PoetPoemController::class)
    ->scoped(['poet' => 'slug', 'poem' => 'slug'])
    ->only(['show']);
