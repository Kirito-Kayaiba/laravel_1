<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartegoryController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    echo"đây là trang giới thiệu";
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/cartegory', [CartegoryController::class, 'index']);
Route::get('/cartegory/all', [CartegoryController::class, 'get_all']);
Route::get('/data', function (){
   $users=DB::table('users')->get();
    echo "<pre>";
    print_r($users);
    echo "</pre>";
});
