<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

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
    public function logout_account()
    {
        Session::put('id_user',null);
        Session::put('tentk',null);
        return redirect('/');
    }
}
