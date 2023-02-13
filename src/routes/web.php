<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RakutenGameController;

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

Route::get('/', [RakutenGameController::class, 'Top']);
Route::get('/search/keyword', [RakutenGameController::class, 'search']);
Route::get('/search/genre/Top', [RakutenGameController::class, 'Top']);
Route::get('/search/genre/NintendoSwitch', [RakutenGameController::class, 'NintendoSwitch']);
Route::get('/search/genre/PS5', [RakutenGameController::class, 'PS5']);
Route::get('/search/genre/PS4', [RakutenGameController::class, 'PS4']);
Route::get('/search/genre/XboxSeriesXS', [RakutenGameController::class, 'XboxSeriesXS']);