<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ThongTinQuanController extends Controller
{
    public function index_add_in4()
    {
        $data = DB::table('loaiquan')->get();
        return view('admin_pages.add_in4_Restaurant')->with('cate_res',$data);
    }
    public function add_in4(Request $request)
    {
        $data = array();
        $data['tenquan'] = $request->name_res;
        $data['trangthai'] = $request->status_res;
        $data['mota'] = $request->des_res;
        $data['id_loai'] = $request->cate_res;
       DB::table('quan')->insert($data);
        $id_quan = DB::getPdo()->lastInsertId();

        $data_vitri = array();
        $data_vitri['diachi'] = $request->address_res;
        $data_vitri['kinhdo'] = $request->lat_res;
        $data_vitri['vido'] = $request->lng_res;
        $data_vitri['id_quan'] = $id_quan;
        
       DB::table('vitri')->insert($data_vitri);
       return redirect('/admin');
    }
    public function index_all_in4()
    {
        $data_quan = DB::table('quan')->join('loaiquan','loaiquan.id_loai','quan.id_loai')->join('vitri','vitri.id_quan','quan.id_quan')->get();
        

        return view('admin_pages.all_res')->with('all_in4',$data_quan);
    }
    public function edit_in4($id_quan)
    {
        $data_quan = DB::table('quan')->join('loaiquan','loaiquan.id_loai','quan.id_loai')->join('vitri','vitri.id_quan','quan.id_quan')->where('quan.id_quan',$id_quan)->get();
        $data_loai = DB::table('loaiquan')->get();
        return view('admin_pages.edit_in4_res')->with('all_in4',$data_quan)->with('cate_res',$data_loai);
    }
    public function update_in4($id_quan, $id_vitri, Request $request)
    {
        $data_quan = array();
        $data_quan['tenquan'] = $request->name_res;
        $data_quan['trangthai'] = $request->status_res;
        $data_quan['mota'] = $request->des_res;
        $data_quan['id_loai'] = $request->cate_res;
       DB::table('quan')->where('id_quan',$id_quan)->update($data_quan);

       $data_vitri = array();
       $data_vitri['diachi'] = $request->address_res;
       $data_vitri['kinhdo'] = $request->lat_res;
       $data_vitri['vido'] = $request->lng_res;
       $data_vitri['id_quan'] = $id_quan;
       
      DB::table('vitri')->where('id_vitri',$id_vitri)->update($data_vitri);
      return redirect('/tat-ca-quan');
    }
}
