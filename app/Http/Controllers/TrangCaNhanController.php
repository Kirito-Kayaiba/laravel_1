<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrangCaNhanController extends Controller
{
    public function index(){
        if(auth()->user()->role <= 1){
            $danhmuc = \DB::table('loaitin')->get();
            return view('/trangcanhan', ['danhmuc' => $danhmuc]);
        }elseif(auth()->user()->role >= 2){
            return redirect('/admin/trangchu');
        }
    }
    public function dangkycongtacvien(){
        $id_user = auth()->user()->id;
        //chỉnh yeuCau thành 1
        $user = \App\Models\User::find($id_user);
        $user->role = 1;
        $user->save();
        return redirect('trangcanhan')->with('success', 'Đăng ký thành công');
    }
}
