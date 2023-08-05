<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tin;
use Carbon\Carbon;

class AdminQuanLyTinTucController extends Controller
{
  function index(){
    //lấy dữ liệu từ database tin
    $tintuc = \DB::table('tin')->paginate(5);
    //lấy 50 ký tự đầu tiên của field tomTat
    return view('Admin.quanlytintuc', ['tintuc'=>$tintuc]);
  }
  function sua($id){
    //lấy tin tức = id
    $tintuc = Tin::find($id);
    return view('Admin.suatintuc', compact('tintuc'));
  }
  public function update(Request $request, $id)
  {
      
      $tintuc = Tin::find($id);
      $tintuc->tieuDe = $request->input('tieuDe');
      $tintuc->tomTat = $request->input('tomTat');
      $tintuc->noiDung = $request->input('noiDung');
      $tintuc->updated_at = now();

      // Xử lý và lưu ảnh vào thư mục public/images (hoặc bất kỳ thư mục nào bạn chọn)
      if ($request->hasFile('urlHinh')) {
        $file = $request->file('urlHinh');
        $extension = $file->getClientOriginalExtension(); // Lấy phần mở rộng của file (ví dụ: jpg, png, ...)
        $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $extension; // Thêm số ngẫu nhiên vào tên file
        $file->move(public_path('img'), $fileName);
        $tintuc->urlHinh = '/img/' . $fileName;
    }  
      $tintuc->save();

      return redirect('/admin/quanlytintuc')->with('success', 'Cập nhật tin tức thành công!');
  }
  function xoa($id){
    $tintuc = Tin::find($id);
    $tintuc->delete();
    return redirect('/admin/quanlytintuc')->with('success', 'Xóa tin tức thành công!');
  }
  function them(){
    $loaitin = \DB::table('loaitin')->get();
    return view('Admin.themtintuc', ['loaitin'=>$loaitin]);
  }
  function store(){
    $tintuc = new Tin();
    $tintuc->tieuDe = request('tieuDe');
    $tintuc->tomTat = request('tomTat');
    $tintuc->noiDung = request('noiDung');
    $tintuc->idLT = request('idLT');
    $tintuc->created_at = now();
    // Xử lý và lưu ảnh vào thư mục public/images (hoặc bất kỳ thư mục nào bạn chọn)
    if (request()->hasFile('urlHinh')) {
      $file = request()->file('urlHinh');
      $extension = $file->getClientOriginalExtension(); // Lấy phần mở rộng của file (ví dụ: jpg, png, ...)
      $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $extension; // Thêm số ngẫu nhiên vào tên file
      $file->move(public_path('img'), $fileName);
      $tintuc->urlHinh = '/img/' . $fileName;
  }
    $tintuc->save();
    return redirect('/admin/quanlytintuc')->with('success', 'Thêm tin tức thành công!');
  }
}