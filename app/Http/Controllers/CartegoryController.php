<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartegoryController extends Controller
{
    //
    function index(){
        $danhmuc = 'chính trị';
        return view('cartegory.index', ['danhmuc'=>$danhmuc]);
    }
    function get_all(){
        echo"đây là trang danh mục";
    }
}
