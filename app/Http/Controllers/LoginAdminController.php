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

class LoginAdminController extends Controller
{
    public function index_login()
    {
       return view('admin_pages.login_admin');
    }
    public function check_login(Request $request)
    {
        $tentk = $request->admin_name;
        $mk = md5( $request->admin_password);
        $check_tk = DB::table('taikhoan_quanli')->where('tentk_ql',$tentk)->first();
        if($check_tk){
            if ($check_tk->mk == $mk) {
                $data_quanli = DB::table('quanli')->where('id_tkql',$check_tk->id_tkql)->first();
                $id_ql = $data_quanli->id_quanli;
                $ten_ql = $data_quanli->ten_quanli;
                Session::put('admin_id',$id_ql);
                Session::put('admin_name',$ten_ql);
                return redirect('/admin');
            }else {
                Session::put('message','Sai mật khẩu. Vui lòng kiểm tra lại !');
                return redirect('/login-admin');
            }
        }else {
            Session::put('message','Tên tài khoản không tồn tại');
            return redirect('/login-admin');
        }
       
    }
    public function index_forgot_admin()
    {
        return view('admin_pages.forgot_password_admin');
    }
    public function check_account_admin(Request $request)
    {
        $tentk_admin = $request->tentk_admin;
        $check_tk = DB::table('taikhoan_quanli')->where('tentk_ql',$tentk_admin)->first();
        if($check_tk){
            $id_tkql = $check_tk->id_tkql;
            $check_email = DB::table('quanli')->where('id_tkql',$id_tkql)->first();
            Session::put('id_tkql',$id_tkql);
            Session::put('tentk_ql',$tentk_admin);
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
               return redirect('/confirm-code-admin');
            }
        }
        else {
            Session::put('message','Không có tài khoản này');
            return redirect('/forgot-password-admin');
        }
    }

    public function confirm_code_admin()
    {
        return view('admin_pages.confirm_code');
    }

    public function check_code_admin(Request $request)
    {
        $code = Session::get('confirm_code');
        $code1 = $request->cf_code;
        if($code == $code1){
            Session::put('confirm_code',null);
            return redirect('/change-password-admin');
        }
        else{
            Session::put('message','Sai mã xác nhận');
            return redirect('/confirm-code-admin');
        }
    }

    public function change_password_admin()
    {
        return view('admin_pages.change_password');
    }

    public function update_password_admin(Request $request)
    {
        $id_tkql = Session::get('id_tkql');
        $tentk_admin = Session::get('tentk_ql');
        $data = array();
        $data['tentk_ql'] = $tentk_admin;
        $data['mk'] = md5($request->new_pass1);
        DB::table('taikhoan_quanli')->where('id_tkql',$id_tkql)->update($data);
        Session::put('id_tkql',null);
        Session::put('tentk_ql',null);
        return redirect('/login-admin');
    }

    public function logout_admin()
    {
        Session::put('admin_id',null);
        Session::put('admin_name',null);
        return redirect('/login-admin');
    }
}
