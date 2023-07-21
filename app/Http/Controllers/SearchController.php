<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search(){
        $search = request('request');
        $data = \DB::table('tin')->where('tieuDe', 'like', '%'.$search.'%')->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('search' ,['data' => $data, 'danhmuc' => $danhmuc, 'search' => $search]);
    }
    public function moinhat(){
        $search = request('request');
        $data = \DB::table('tin')->where('tieuDe', 'like', '%'.$search.'%')->orderBy('id', 'desc')->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('search' ,['data' => $data, 'danhmuc' => $danhmuc, 'search' => $search]);
    }
    public function hot(){
        $search = request('request');
        $data = \DB::table('tin')->where('tieuDe', 'like', '%'.$search.'%')->orderBy('xem', 'desc')->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('search' ,['data' => $data, 'danhmuc' => $danhmuc, 'search' => $search]);
    }
}
