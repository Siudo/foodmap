<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoaiQuanController extends Controller
{
    public function index_add_cate()
    {
        return view('admin_pages.add_category_res');
    }
    public function save_cate_res(Request $request)
    {
        $data = array();
        $data['tenloai'] = $request->cate_res;
        DB::table('loaiquan')->insert($data);
        Session::put('message',"Đã thêm !");
        return redirect('/tat-ca-loai');
    }
    public function all_cate_res()
    {
        $data_cate_res = DB::table('loaiquan')->get();
        return view('admin_pages.all_category_res')->with('all_cate',$data_cate_res);
    }
    public function edit_cate_res($id_loai)
    {
        $data = DB::table('loaiquan')->where('id_loai',$id_loai)->get();
        return view('admin_pages.edit_cate_res')->with('edt_cate',$data);
    }
    public function update_cate_res($id_loai, Request $request)
    {
        $data = array();
        $data['tenloai'] = $request->cate_res;
       DB::table('loaiquan')->where('id_loai',$id_loai)->update($data);        
       Session::put('message',"Đã sửa !");
       return redirect('/tat-ca-loai');
    }
    public function delete_Cate_res($id_loai)
    {
        DB::table('loaiquan')->where('id_loai',$id_loai)->delete();    
        Session::put('message',"Đã xoá !");
        return redirect('/tat-ca-loai');
        
    }
}
