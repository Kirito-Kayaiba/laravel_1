<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        $data = \DB::table('tin')->orderBy('xem', 'desc')->limit(7)->get();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('home' ,['data' => $data, 'danhmuc' => $danhmuc]);
    }
}
