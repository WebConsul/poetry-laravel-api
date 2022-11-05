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

//todo:
// так как у нас исключительно api, без web,
// необходимо добавить middleware проверяющий наличие заголовка:
// key: 'X-Requested-With', value: 'XMLHttpRequest'
// чтобы при обращении, не было случайных попыток удариться в web и получить 404
// либо сделать эту проверку другим альтернативным способом

Route::get('/', function () {
    return ['name' => env('APP_NAME')];
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/me', [UserController::class, 'me']);
});

Route::controller(PoetController::class)->group(function () {
    Route::get('/poets/{slug}', 'show')->name('poet.show');
    Route::get('/poets', 'getPoets');
    Route::post('/poets', 'create')->name('poet.create');
});

Route::resource('poets.poems', PoetPoemController::class)
    ->scoped(['poet' => 'slug', 'poem' => 'slug'])
    ->only(['show']);
