<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SnakeController;

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

Route::get('/snake', function(){
    return view('snake');
});


Route::middleware('auth')->get('/games', [GameController::class, "games"]);
Route::middleware('auth')->get('/game/start/{id}', [GameController::class, "start"]);
Route::middleware('auth')->get('/move', [SnakeController::class, "move"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
