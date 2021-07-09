<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class DatBanController extends Controller
{
    public function index_datban($id_quan)
    {
        $data = DB::table('quan')->where('id_quan',$id_quan)->get();


        $menu = DB::table('thucdon')->where('thucdon.id_quan',$id_quan)->orderby('loaimon')->get();

        $loai = DB::table('loaithucdon')->join('thucdon','loaithucdon.id_loaitd','thucdon.id_loaitd')->select('loaithucdon.id_loaitd','loaithucdon.tenloaitd')->where('thucdon.id_quan',$id_quan)->groupbyraw('loaithucdon.id_loaitd,loaithucdon.tenloaitd')->get();
  
        // echo '<pre>';
        // print_r($loai);
        // echo '</pre>';

      return view('user_pages.datban_user')->with('data_quan',$data)->with('menu',$menu)->with('loaitd',$loai);
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
       
                    
                    if(! is_NULL($check_time)) {
                        Session::put("dadk","Bạn đã đặt bàn tại khung giờ này rồi !");
                        return redirect("/datban/".$id_quan);
                    }
                    else {
                        DB::table('datban')->insert($data_book);
                        $id_datban = DB::getPdo()->lastInsertId();
                    
                        //insert mon
                        $data_chonmon = array();
        
                        $data_chonmon = $request->input('chon_mon');
                        $soluong = array();
                        $soluong = $request->input('soluong');
                        $check = array();
                        foreach ($soluong as $key => $sl) {
                            if($sl != null){
                                array_push($check,$sl);
                            }
                            
                        }
                        $data_mon = array();
                        $data_mon['id_datban'] = $id_datban;
                
                        for($i = 0; $i < count($data_chonmon); $i++){
                            $data_mon['id_thucdon'] = $data_chonmon[$i];
                            $data_mon['SL'] = $check[$i];
                            DB::table('datmon')->insert($data_mon);
                        }

                        $tenq = DB::table('quan')->where('id_quan',$id_quan)->first()->tenquan;
                   
                        // Gửi mail
                        $mail = DB::table('khachhang')->join('taikhoan_kh','taikhoan_kh.id_tkkh','khachhang.id_tkkh')->where('khachhang.id_tkkh',$id_tk)->first()->email;
                        $to_name = $tenq ;
                        $to_email = $mail ;

                        $data = array("name"=> $to_name);
        
                        Mail::send('sendmail.sendmail_book',$data, function ($message) use($to_name,$to_email) {
                            $message->from($to_email, $to_name);
                            $message->to($to_email)->subject('THANK YOU FOR USING MY SERVICE');
          
                        });

                        Session::put("thanhcong","Đã đặt bàn thành công");
                        return redirect("/datban/".$id_quan);
                     
                    }
                }
                else {
                    DB::table('datban')->insert($data_book);
                    $id_datban = DB::getPdo()->lastInsertId();
                   
                    $data_chonmon = array();
                    $soluong = $request->input('soluong');
                    $data_chonmon = $request->input('chon_mon');

                    $check = array();
                        foreach ($soluong as $key => $sl) {
                            if($sl != null){
                                array_push($check,$sl);
                            }
                        }
                    $data_mon = array();
                    $data_mon['id_datban'] = $id_datban;
                    
                    for($i = 0; $i < count($data_chonmon); $i++){
                        $data_mon['id_thucdon'] = $data_chonmon[$i];
                        $data_mon['SL'] = $check[$i];
                        DB::table('datmon')->insert($data_mon);
                    }


                   //Gửi mail

                   $mail = DB::table('khachhang')->join('taikhoan_kh','taikhoan_kh.id_tkkh','khachhang.id_tkkh')->where('khachhang.id_tkkh',$id_tk)->first()->email;
                        $to_name = $tenq ;
                        $to_email = $mail ;

                        $data = array("name"=> $to_name);
        
                    Mail::send('sendmail.sendmail_book',$data, function ($message) use($to_name,$to_email) {
                            $message->from($to_email, $to_name);
                            $message->to($to_email)->subject('THANK YOU FOR USING MY SERVICE');
          
                    });
                    
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

    public function authlogin()
    {
        $id_tk = Session::get("id_user");
        $tentk = Session::get("tentk");
        if($id_tk){
            return Redirect::to('/profile');
        }
        else{
            return Redirect::to('login-user')->send();
        }
    }







    public function index_profile()
    {
        $this->authlogin();
        return view('user_profile');
    }
  
    public function profile_datban()
    {
        $this->authlogin();
        $id_tk = Session::get("id_user");
        $id_kh = DB::table('khachhang')->where('id_tkkh',$id_tk)->first()->id_khachhang;

        $data_book = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->where('id_khachhang',$id_kh)->orderBy('id_datban','desc')->paginate(10);
        return view('profile_user.in4_prof_book')->with('all_in4',$data_book);
    }

    public function profile_menu($id_datban)
    {
        $this->authlogin();
        $data_menu = DB::table('datmon')->join('thucdon','thucdon.id_thucdon','datmon.id_thucdon')->where('datmon.id_datban',$id_datban)->paginate(10);
        return view('profile_user.in4_prof_menu')->with('data_menu',$data_menu);
    }



}