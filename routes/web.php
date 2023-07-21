<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartegoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DanhMucController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/tin/{id}', [TinController::class, 'tin']);
Route::get('/search', [SearchController::class, 'search']);
Route::get('/search/moinhat', [SearchController::class, 'moinhat']);
Route::get('/search/hot', [SearchController::class, 'hot']);
Route::get('/danhmuc/{id}', [DanhMucController::class, 'danhmuc']);
Route::get('/danhmuc/hot/{id}', [DanhMucController::class, 'hot']);
Route::get('/danhmuc/moinhat/{id}', [DanhMucController::class, 'moinhat']);
?>