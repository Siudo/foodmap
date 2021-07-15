<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('user_pages.login_user');
    }
    public function login_account(Request $request)
    {
        $tentk = $request->tentk_user;
        $mk = md5($request->password_user);
        if(DB::table('taikhoan_kh')->where('tentk',$tentk)->where('mk',$mk)->first()){
            $id_user = DB::table('taikhoan_kh')->where('tentk',$tentk)->where('mk',$mk)->first()->id_tkkh;
            Session::put('id_user',$id_user);
            Session::put('tentk',$tentk);
            return redirect('/');
        }
        else{
            return redirect('/login-user');
        }
        
    }

    public function index_forgot_password()
    {
        return view('user_pages.forgot_password_user');
    }

    public function check_account(Request $request)
    {
        $tentk_user = $request->tentk_user;
        $check_tk = DB::table('taikhoan_kh')->where('tentk',$tentk_user)->first();
        if($check_tk){
            $id_tkkh = $check_tk->id_tkkh;
            $check_email = DB::table('khachhang')->where('id_tkkh',$id_tkkh)->first();
            Session::put('id_tkkh',$id_tkkh);
            Session::put('tentk',$tentk_user);
            if($check_email){                   
                // Gửi mail
             
                $to_name = "Foodmap";
                $mail = $check_email->email;
                $confirm_code = Str::random(8);
                $to_email = $mail ;
              
                Session::put('confirm_code',$confirm_code);

                $data = array("confirm_code"=> $confirm_code);
        
                Mail::send('sendmail.sendmail_forgot',$data, function ($message) use($to_name,$to_email) {
                    $message->from($to_email, $to_name);
                    $message->to($to_email)->subject('MÃ XÁC NHẬN CỦA BẠN');
          
                });
               return redirect('/confirm-code-user');
            }
        }
        else {
            Session::put('message','Không có tài khoản này');
            return redirect('/forgot-password-user');
        }
    }

    public function index_confirm_code()
    {
        return view('user_pages.confirm_code_user');
    }

    public function check_confirm_code(Request $request)
    {
        $code = Session::get('confirm_code');
        $code1 = $request->cf_code;
        if($code == $code1){
            Session::put('confirm_code',null);
            return redirect('/change-password-user');
        }
        else{
            Session::put('message','Sai mã xác nhận');
            return redirect('/confirm-code-user');
        }
    }

    public function index_change_password()
    {
        return view('user_pages.change_password_user');
    }

    public function update_password(Request $request)
    {
        $id_tkkh = Session::get('id_tkkh');
        $tentk_user = Session::get('tentk');
        $data = array();
        $data['tentk'] = $tentk_user;
        $data['mk'] = md5($request->new_pass1);
        DB::table('taikhoan_kh')->where('id_tkkh',$id_tkkh)->update($data);
        Session::put('id_tkkh',null);
        Session::put('tentk',null);
        return redirect('/login-user');
    }

    public function logout_account()
    {
        Session::put('id_user',null);
        Session::put('tentk',null);
        return redirect('/');
    }
}
