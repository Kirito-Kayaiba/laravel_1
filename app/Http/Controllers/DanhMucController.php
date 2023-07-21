<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function danhmuc($id){
        $data = \DB::table('tin')->where('idLT', $id)->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('timtheodanhmuc' ,['data' => $data, 'danhmuc' => $danhmuc, 'id' => $id]);
    }
    public function moinhat($id){
        $data = \DB::table('tin')->where('idLT', $id)->orderBy('id', 'desc')->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('timtheodanhmuc' ,['data' => $data, 'danhmuc' => $danhmuc, 'id' => $id]);
    }
    public function hot($id){
        $data = \DB::table('tin')->where('idLT', $id)->orderBy('xem', 'desc')->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('timtheodanhmuc' ,['data' => $data, 'danhmuc' => $danhmuc, 'id' => $id]);
    }
}
