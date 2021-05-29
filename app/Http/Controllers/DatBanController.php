<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;

class DatBanController extends Controller
{
    public function index_datban($id_quan)
    {
        $data = DB::table('quan')->where('id_quan',$id_quan)->get();
       return view('user_pages.datban_user')->with('data_quan',$data);
    }
    public function add_datban($id_quan, Request $request)
    {
        $id_tk = Session::get("id_user");
        $tentk = Session::get("tentk");
        if($tentk == null){
            return view("user_pages.login_user");
        }
        else {
            $id_kh = DB::table('khachhang')->join('taikhoan_kh','taikhoan_kh.id_tkkh','khachhang.id_tkkh')->where('khachhang.id_tkkh',$id_tk)->first()->id_khachhang;
            $check_kh = DB::table('datban')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('datban.id_khachhang',$id_kh)->get();
            $date_book = $request->date_book;
            $time_book = $request->time_book;
            //$time = new Carbon();
            $time = $date_book +"  "+ $time_book;

            echo '<pre>';
            print_r($time);
            echo '</pre>';
// dd
            // $check_tg = 
            // if($check_kh != null){
            //     if($check_kh){

            //     }
            //     Session::put("thanhcong","Đã đặt bàn thành công");
            //     return redirect("/datban/".$id_quan);
            // }
            // else {
            //     # code...
            // }
            
            // Session::put("thanhcong","Đã đặt bàn thành công");
            // return redirect("/datban/".$id_quan);
        }
    }
}
