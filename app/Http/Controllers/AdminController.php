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
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }
        else{
            return Redirect::to('login-admin')->send();
        }
    }
   
    public function index()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->get();
        return view('admin')->with('data_mes',$data_mes);
    }
}
