<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class TinController extends Controller
{
    public function tin($id){
        $data = \DB::table('tin')->where('id', $id)->first();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('danhmuc' ,['data' => $data, 'danhmuc' => $danhmuc]);
    }
}
