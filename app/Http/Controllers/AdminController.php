<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('quantri');
        if($admin_id){
            return redirect('/quantri');
        }
        else{
            return Redirect::to('login-quantri')->send();
        }
    }
   
    public function index()
    {
        $this->AuthLogin();
        $data_tk = DB::table('taikhoan_quanli')->paginate(10);
        return view('quantri.quanlytk')->with('data_tk',$data_tk);
    }

    public function xacnhan_tk($id_tkql)
    {
        $this->AuthLogin();
        $get_data = DB::table('taikhoan_quanli')->where('id_tkql',$id_tkql)->first();
        $data = array();
        $data['id_tkql'] = $id_tkql;
        $data['tentk_ql'] = $get_data->tentk_ql;
        $data['mk'] = $get_data->mk;
        if($get_data->trangthai){
            $data['trangthai'] = false;
        }
        else {
            $data['trangthai'] = true;
        }
        DB::table('taikhoan_quanli')->where('id_tkql',$id_tkql)->update($data);
        return redirect('/quantri');
    }

    public function login_quantri()
    {
        return view('quantri.login_quantri');
    }
    public function check_login_quantri(Request $request)
    {
        $tentk = $request->taikhoan;
        $mk = md5( $request->matkhau);
        $check_tk = DB::table('quantri')->where('tentk',$tentk)->first();
        if($check_tk){
            if ($check_tk->mk == $mk){
                Session::put('quantri',$tentk);
                return redirect('/quantri');
            }else {
                Session::put('message','Sai mật khẩu. Vui lòng kiểm tra lại !');
                return redirect('/login-quantri');
            }
        }else {
            Session::put('message','Tên tài khoản không tồn tại');
            return redirect('/login-quantri');
        }
    }

    public function logout_quantri()
    {
        Session::put('quantri',null);
        return redirect('/login-quantri');
    }

}
