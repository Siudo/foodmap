<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

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
    public function logout_admin()
    {
        Session::put('admin_id',null);
        Session::put('admin_name',null);
        return redirect('/login-admin');
    }
}
