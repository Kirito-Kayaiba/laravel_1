<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {   
        // tổng số bài viết
        $tongbaiviet = \DB::table('tin')->count();
        $tongnguoidung = \DB::table('users')->count(); //
        //hiện người dùng có yeuCau=1
        $yeucau = \DB::table('users')->where('yeuCau', 1)->get();
        //lấy tất cả id có yeucau=1
        //đếm tất cả bài viết của id đó
        $dangky = \DB::table('users')->where('role', 1)->get();
        return view('Admin.home', compact('tongbaiviet', 'tongnguoidung', 'yeucau', 'dangky'));
    }
    public function xacminh($id){
        //lấy tên của id
        $name = \DB::table('users')->where('id', $id)->value('name');
        $user = \DB::table('users')->where('id', $id)->update(['yeuCau' => 0,'veryfi' => 1]);
        return redirect('admin/trangchu');
    }
    public function xoa($id){
        $user = \DB::table('users')->where('id', $id)->update(['yeuCau' => 0]);
        return redirect('admin/trangchu');
    }
    public function dangky($id){
        $user = \DB::table('users')->where('id', $id)->update(['role' => 2]);
        return redirect('admin/trangchu');
    }
    public function huydangky($id){
        $user = \DB::table('users')->where('id', $id)->update(['role' => 0]);
        return redirect('admin/trangchu');
    }
    public function getdata(){
        return view('Admin.bieudobaiviet.getdata');
    }
}
