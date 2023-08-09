<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('danhmuc/{id}', [\App\Http\Controllers\DanhMucController::class, 'danhmuc']);
Route::get('danhmuc/moinhat/{id}', [\App\Http\Controllers\DanhMucController::class, 'moinhat']);
Route::get('danhmuc/hot/{id}', [\App\Http\Controllers\DanhMucController::class, 'hot']);
Route::get('search', [\App\Http\Controllers\SearchController::class, 'search']);
Route::get('search/moinhat', [\App\Http\Controllers\SearchController::class, 'moinhat']);
Route::get('search/hot', [\App\Http\Controllers\SearchController::class, 'hot']);
Route::get('tin/{id}', [\App\Http\Controllers\TinController::class, 'tin']);
Route::get('danhmuc/tin/{id}', [\App\Http\Controllers\TinController::class, 'tin']);
Route::get('admin/quanlytintuc/them', [\App\Http\Controllers\AdminQuanLyTinTucController::class, 'them'])->middleware('auth');
Route::post('admin/quanlytintuc/them', [\App\Http\Controllers\AdminQuanLyTinTucController::class, 'store'])->middleware('auth');
Route::get('admin/quanlytintuc', [\App\Http\Controllers\AdminQuanLyTinTucController::class, 'index'])->middleware('auth');
Route::group(['middleware' => 'check.article.access'], function () {
Route::get('admin/quanlytintuc/sua/{id}', [\App\Http\Controllers\AdminQuanLyTinTucController::class, 'sua'])->middleware('auth');
Route::post('admin/quanlytintuc/sua/{id}', [\App\Http\Controllers\AdminQuanLyTinTucController::class, 'update'])->middleware('auth');

Route::get('admin/quanlytintuc/xoa/{id}', [\App\Http\Controllers\AdminQuanLyTinTucController::class, 'xoa'])->middleware('auth');
});
Route::get('unauthorized', function () {
    return response('Unauthorized', 401);
})->name('unauthorized');
Route::get('trangcanhan', [\App\Http\Controllers\TrangCaNhanController::class, 'index'])->middleware('auth');
Route::get('trangcanhan/dangkycongtacvien', [\App\Http\Controllers\TrangCaNhanController::class, 'dangkycongtacvien'])->middleware('auth');
Route::get('admin/setting', [\App\Http\Controllers\AdminSettingController::class, 'index'])->middleware('auth');
Route::post('admin/setting', [\App\Http\Controllers\AdminSettingController::class, 'update'])->middleware('auth');
Route::get('admin/setting/dangkytichxanh', [\App\Http\Controllers\AdminSettingController::class, 'dangkytichxanh'])->middleware('auth');
Route::get('phanquyen', [\App\Http\Controllers\PhanQuyenController::class, 'index'])->middleware('auth');
Route::group(['middleware' => 'check.admin.role'], function () {
    // Các route trong nhóm này chỉ người dùng có role > 2 mới được truy cập
    Route::get('admin/quanlynguoidung', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'index'])->middleware('auth');
    Route::get('admin/quanlynguoidung/sua/{id}', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'sua'])->middleware('auth');
    Route::post('admin/quanlynguoidung/sua/{id}', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'update'])->middleware('auth');
    Route::get('admin/quanlynguoidung/khoa/{id}', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'khoa'])->middleware('auth');
    Route::get('admin/quanlynguoidung/mokhoa/{id}', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'mokhoa'])->middleware('auth');
    Route::get('admin/quanlynguoidung/them', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'them'])->middleware('auth');
    Route::post('admin/quanlynguoidung/them', [\App\Http\Controllers\AdminQuanLyNguoiDungController::class, 'store'])->middleware('auth');
    Route::get('admin/trangchu', [\App\Http\Controllers\AdminHomeController::class, 'index'])->middleware('auth');
    Route::get('admin/trangchu/xacminh{id}', [\App\Http\Controllers\AdminHomeController::class, 'xacminh'])->middleware('auth');
    Route::get('admin/trangchu/xoa{id}', [\App\Http\Controllers\AdminHomeController::class, 'xoa'])->middleware('auth');
    Route::get('admin/trangchu/dangky{id}', [\App\Http\Controllers\AdminHomeController::class, 'dangky'])->middleware('auth');
    Route::get('admin/trangchu/huydangky{id}', [\App\Http\Controllers\AdminHomeController::class, 'huydangky'])->middleware('auth');
    Route::get('admin/bieudobaiviet/getdata', [\App\Http\Controllers\AdminHomeController::class, 'getdata']);

});

Route::post('/admin/setting/muagoisolandangbai', [\App\Http\Controllers\AdminSettingController::class, 'muagoisolandangbai'])->middleware('auth');
Route::get('admin/setting/verify/goisolandangbai', [\App\Http\Controllers\AdminSettingController::class, 'goisolandangbai'])->middleware('auth'); 

Route::post('/admin/setting/muagoithangdangbai', [\App\Http\Controllers\AdminSettingController::class, 'muagoithangdangbai'])->middleware('auth');
Route::get('admin/setting/verify/goithangdangbai', [\App\Http\Controllers\AdminSettingController::class, 'goithangdangbai'])->middleware('auth');
Route::post('/chat', 'ChatController@sendMessage');
Route::post('admin/setting/muagoitichxanh', [\App\Http\Controllers\AdminSettingController::class, 'muagoitichxanh'])->middleware('auth');
Route::get('admin/setting/verify', [\App\Http\Controllers\AdminSettingController::class, 'verify'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';