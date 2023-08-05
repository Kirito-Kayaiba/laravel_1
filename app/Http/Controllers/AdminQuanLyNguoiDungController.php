<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AdminQuanLyNguoiDungController extends Controller
{

    public function index()
    {
        $nguoidung = \DB::table('users')->paginate(5);

        return view('Admin.quanlynguoidung', compact('nguoidung'));
    }
    public function sua($id)
    {
        $nguoidung = \DB::table('users')->where('id', $id)->first();
        return view('Admin.suanguoidung', compact('nguoidung'));
    }
    public function update(Request $request, $id)
    {
        $nguoidung = User::find($id);
        $nguoidung->name = $request->input('name');
        $nguoidung->email = $request->input('email');
        if ($request->get('password') != null) {
            if ($request->get('password') == $request->get('password_record')) {
                $nguoidung->password = bcrypt($request->get('password'));
            } else {
                return redirect('admin/quanlynguoidung/sua/'.$id)->with('error', 'Mật khẩu không khớp');
            }
        }
        $nguoidung->role = $request->input('role');
        $nguoidung->updated_at = now();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // Lấy phần mở rộng của file (ví dụ: jpg, png, ...)
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $extension; // Thêm số ngẫu nhiên vào tên file
            $file->move(public_path('img'), $fileName);
            $nguoidung->avatar = '/img/' . $fileName;
        }
        $nguoidung->save();
        return redirect('admin/quanlynguoidung')->with('success', 'Cập nhật thành công');
    }
    public function khoa($id)
    {
        $nguoidung = User::find($id);
        $nguoidung->status = 0;
        $nguoidung->save();
        return redirect('admin/quanlynguoidung')->with('success', 'Khóa thành công');
    }
    public function mokhoa($id)
    {
        $nguoidung = User::find($id);
        $nguoidung->status = 1;
        $nguoidung->save();
        return redirect('admin/quanlynguoidung')->with('success', 'Mở khóa thành công');
    }
    public function them()
    {
        return view('Admin.themnguoidung');
    }
    public function store(Request $request)
    {
        $nguoidung = new User();
        $nguoidung->name = $request->input('name');
        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect('admin/quanlynguoidung/them')->with('error', 'Email đã tồn tại');
        }else{
            $nguoidung->email = $request->input('email');
        }
        if ($request->get('password') == $request->get('password_record')) {
                $nguoidung->password = bcrypt($request->get('password'));
            } else {
                return redirect('admin/quanlynguoidung/them')->with('error', 'Mật khẩu không khớp');
            }
        $nguoidung->role = $request->input('role');
        $nguoidung->created_at = now();
        $nguoidung->updated_at = now();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // Lấy phần mở rộng của file (ví dụ: jpg, png, ...)
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $extension; // Thêm số ngẫu nhiên vào tên file
            $file->move(public_path('img'), $fileName);
            $nguoidung->avatar = '/img/' . $fileName;
        }
        $nguoidung->save();
        return redirect('admin/quanlynguoidung')->with('success', 'Thêm thành công');
    }
}