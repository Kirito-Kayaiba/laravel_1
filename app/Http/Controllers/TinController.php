<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tin;
use DB;
class TinController extends Controller
{
    public function tin($id){
        $tin = Tin::find($id);
        if ($tin) {
            // Tăng giá trị lượt xem lên 1
            $tin->xem += 1;
            $tin->save();
        }
        $data = \DB::table('tin')->where('id', $id)->first();
        $danhmuc = \DB::table('loaiTin')->get();
        return view('tintuc' ,['data' => $data, 'danhmuc' => $danhmuc]);

    }
}
