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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_tk = Session::get("id_user");
        $tentk = Session::get("tentk");
        if($tentk == null){
            return view("user_pages.login_user");
        }
        else {
            $id_kh = DB::table('khachhang')->join('taikhoan_kh','taikhoan_kh.id_tkkh','khachhang.id_tkkh')->where('khachhang.id_tkkh',$id_tk)->first()->id_khachhang;
            $check_kh = DB::table('datban')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('datban.id_khachhang',$id_kh)->first();
            $date_book = $request->date_book;
            $time_book = $request->time_book;
            $time = date('Y-m-d H:i',strtotime($date_book." ".$time_book));
            $data_book = array();
            $data_book['id_khachhang'] = $id_kh;
            $data_book['id_quan'] = $id_quan;
            $data_book['ngaygio'] = $time;
            $data_book['songuoi'] = $request->songuoi_book;
            $data_book['ngaydat'] = date('Y-m-d');
            $data_book['trangthai_book'] = true;
       
            if (strtotime(date('Y-m-d H:i')) < strtotime($time)){
                
                if($check_kh){
                    $check_time = DB::table('datban')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('datban.id_khachhang',$id_kh)->where('datban.ngaygio',$time)->first();
            //         echo '<pre>';
            // print_r($check_time);
            // echo '</pre>';
                    
                    if(! is_NULL($check_time)) {
                        Session::put("dadk","Bạn đã đặt bàn tại khung giờ này rồi !");
                        return redirect("/datban/".$id_quan);
                    }
                    else {
                        DB::table('datban')->insert($data_book);
                        Session::put("thanhcong","Đã đặt bàn thành công");
                        return redirect("/datban/".$id_quan);
                    }
                }
                else {
                    DB::table('datban')->insert($data_book);
                    Session::put("thanhcong","Đã đặt bàn thành công");
                    return redirect("/datban/".$id_quan);
                    
                }
               
            }
            else {
                
                Session::put("error","Thời gian không hợp lệ !");
                return redirect("/datban/".$id_quan);
            }
            
           
        }
    }
}
