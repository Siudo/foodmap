<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('user_pages.register_user');
    }
    public function regist_account(Request $request)
    {
        $data_tk = array();
        $data_tk['tentk'] = $request->tentk_user;
        $data_tk['mk'] = md5($request->password_user);
        $data = array();
        $data['tenkh'] = $request->ten_user;
        $data['sdt'] = $request->sdt_user;
        $data['email'] = $request->email_user;
        if(DB::table('taikhoan_kh')->where('tentk',$data_tk['tentk'])->first()){
            Session::put('message',"Tên tài khoản đã có người sử dụng");
            return redirect('/register-user');
        }
        else{
            DB::table('taikhoan_kh')->insert($data_tk);
            $id_tk = DB::getPdo()->lastInsertId();
            $data['id_tkkh'] = $id_tk;
            DB::table('khachhang')->insert($data);
            return redirect('/login-user');
        }
    }
}
