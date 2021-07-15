<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\ThucDonImports;
use Excel;
use ThucDon;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ThongTinQuanController extends Controller
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
    public function Roles()
    {
        
    }

    public function index_add_in4()
    {
        $this->AuthLogin();

        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->get();
       
        $data = DB::table('loaiquan')->get();
        return view('admin_pages.add_in4_Restaurant')->with('cate_res',$data)->with('data_mes',$data_mes);
    }
    public function add_in4(Request $request)
    {

        $this->AuthLogin();
       
        $data_quan = array();
        $data_quan['tenquan'] = $request->name_res;
        $data_quan['tgianmocua'] = $request->status_res;
        $data_quan['mota'] = $request->des_res;
        $data_quan['trangthai'] = true;
        $data_quan['id_loai'] = $request->cate_res;
        $admin_id = Session::get('admin_id');
        $data_quan['id_quanli'] = $admin_id;
        $get_image = $request->file('img_res');
        if($get_image){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d-m-y--h-i-s');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $date.'_'.$name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/res_img',$new_image);
            $data_quan['hinhdd']= $new_image;
            DB::table('quan')->insert($data_quan);
            $id_quan = DB::getPdo()->lastInsertId();
            $data_vitri = array();
            $data_vitri['diachi'] = $request->address_res;
            $data_vitri['kinhdo'] = $request->lat_res;
            $data_vitri['vido'] = $request->lng_res;
            $data_vitri['id_quan'] = $id_quan;
       
            DB::table('vitri')->insert($data_vitri);
            return redirect('/tat-ca-quan');
        }else{
            $data['hinhdd']= null;
            DB::table('quan')->insert($data);
            $id_quan = DB::getPdo()->lastInsertId();
            $data_vitri = array();
            $data_vitri['diachi'] = $request->address_res;
            $data_vitri['kinhdo'] = $request->lat_res;
            $data_vitri['vido'] = $request->lng_res;
            $data_vitri['id_quan'] = $id_quan;
       
            DB::table('vitri')->insert($data_vitri);
            return redirect('/tat-ca-quan');

        }
    }
    public function index_all_in4()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->get();
        $admin_id = Session::get('admin_id');
        $data_quan = DB::table('quan')->join('loaiquan','loaiquan.id_loai','quan.id_loai')->join('vitri','vitri.id_quan','quan.id_quan')->where('id_quanli',$admin_id)->get();
        

        return view('admin_pages.all_res')->with('all_in4',$data_quan)->with('data_mes',$data_mes);
    }
    public function edit_in4($id_quan)
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->get();
        $data_quan = DB::table('quan')->join('loaiquan','loaiquan.id_loai','quan.id_loai')->join('vitri','vitri.id_quan','quan.id_quan')->where('quan.id_quan',$id_quan)->get();
        $data_loai = DB::table('loaiquan')->get();
        return view('admin_pages.edit_in4_res')->with('all_in4',$data_quan)->with('cate_res',$data_loai)->with('data_mes',$data_mes);
    }
    public function update_in4($id_quan, $id_vitri, Request $request)
    {
        $this->AuthLogin();
        $data_quan = array();
        $data_quan['tenquan'] = $request->name_res;
        $data_quan['tgianmocua'] = $request->status_res;
        $data_quan['mota'] = $request->des_res;
        $data_quan['trangthai'] = true;
        $data_quan['id_loai'] = $request->cate_res;
        $data_quan['id_quanli'] = $admin_id;
        $get_image = $request->file('img_res');
        if($get_image){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d-m-y--h-i-s');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $date.'_'.$name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/courseimage',$new_image);
            $data_quan['hinhdd']= $new_image;
            DB::table('quan')->where('id_quan',$id_quan)->update($data_quan);
            $data_vitri = array();
            $data_vitri['diachi'] = $request->address_res;
            $data_vitri['kinhdo'] = $request->lat_res;
            $data_vitri['vido'] = $request->lng_res;
            $data_vitri['id_quan'] = $id_quan;
       
            DB::table('vitri')->where('id_vitri',$id_vitri)->update($data_vitri);
            return redirect('/tat-ca-quan');
        }else{
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

    public function delete_in4_res($id_quan)
    {
        $this->AuthLogin();
        $data_array = array();
        $data = DB::table('quan')->where('id_quan',$id_quan)->first();
    
        if($data->trangthai){

            $data_array['tenquan'] = $data->tenquan;
            $data_array['tgianmocua'] = $data->tgianmocua;
            $data_array['mota'] = $data->mota;
            $data_array['trangthai'] = false;
            $data_array['hinhdd'] = $data->hinhdd;
            $data_array['id_loai'] = $data->id_loai;

            DB::table('quan')->where('id_quan',$id_quan)->update($data_array);
            return redirect('/tat-ca-quan');
        }
        else {
            $data_array['tenquan'] = $data->tenquan;
            $data_array['tgianmocua'] = $data->tgianmocua;
            $data_array['mota'] = $data->mota;
            $data_array['trangthai'] = true;
            $data_array['hinhdd'] = $data->hinhdd;
            $data_array['id_loai'] = $data->id_loai;
            DB::table('quan')->where('id_quan',$id_quan)->update($data_array);
            return redirect('/tat-ca-quan');
        }
    }
    public function xacnhan_detail_order($id_datban)
    {
        $get_data = DB::table('datban')->where('id_datban',$id_datban)->first();
        $data = array();
        $data['id_datban'] = $id_datban;
        $data['id_quan'] = $get_data->id_quan;
        $data['id_khachhang'] = $get_data->id_khachhang;
        $data['ngaygio'] = $get_data->ngaygio;
        $data['songuoi'] = $get_data->songuoi;
        $data['trangthai_book'] = false;
        DB::table('datban')->where('id_datban',$id_datban)->update($data);
        return redirect('/chitiet-datban');
    }

    public function detail_order()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->paginate(10);
        return view('admin_pages.detail_order')->with('data_mes',$data_mes);
    }


    public function dashboard()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $book_onday = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->where('ngaydat',date('Y-m-d'))->where('quan.id_quanli',$admin_id)->count();
        $ds_book = DB::table('datban')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->join('quan','quan.id_quan','datban.id_quan')->where('ngaydat',date('Y-m-d'))->where('quan.id_quanli',$admin_id)->get();
        
        $book_onmonth = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->whereMonth('ngaydat',date('m'))->whereYear('ngaydat',date('Y'))->where('quan.id_quanli',$admin_id)->count();
        
        $book_meal_onday = DB::table('datban')->join('datmon','datmon.id_datban','datban.id_datban')->join('quan','quan.id_quan','datban.id_quan')->whereMonth('ngaygio',date('m'))->whereYear('ngaygio',date('Y'))->where('quan.id_quanli',$admin_id)->sum('datmon.SL');
        
        $songuoi_onmonth = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->whereMonth('ngaygio',date('m'))->whereYear('ngaygio',date('Y'))->where('quan.id_quanli',$admin_id)->sum('datban.songuoi');
        
        $ds_book_onday = DB::table('datban')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->join('quan','quan.id_quan','datban.id_quan')->where('ngaygio',date('Y-m-d'))->where('quan.id_quanli',$admin_id)->get();
        return view('admin_pages.dashboard')->with('data_mes',$data_mes)->with('book_onday',$book_onday)->with('book_onmonth',$book_onmonth)->with('songuoi_onmonth',$songuoi_onmonth)->with('book_meal_onday',$book_meal_onday)->with('ds_book',$ds_book)->with('ds_book_onday',$ds_book_onday);
    }

    public function edit_location()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();
        
        $data_res = DB::table('quan')->join('vitri','vitri.id_quan','quan.id_quan')->where('quan.id_quanli',$admin_id)->get();
        
        return view('admin_pages.locations_res')->with('data_mes',$data_mes)->with('data_res',$data_res);
    }

    public function save_location($id_vitri,$id_quan, Request $request)
    {
        $data = array();
        $data['diachi'] = $request->address_res;
        $data['vido'] = $request->lat_res;
        $data['kinhdo'] = $request->lng_res;
        $data['id_quan'] = $id_quan;
        DB::table('vitri')->where('id_vitri',$id_vitri)->update($data);
        return redirect('/tat-ca-quan');

    }


    // cate Menu

    public function index_add_cate_menu()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();

        return view('admin_pages.add_cate_menu')->with('data_mes',$data_mes);
    }

    public function save_cate_menu(Request $request)
    {
        $this->AuthLogin();

        $data_cate = array();
        $data_cate['tenloaitd'] = $request->cate_menu;
        DB::table('loaithucdon')->insert($data_cate);
        return redirect('/tatca-loai-thucdon');
    }
    public function index_all_cate_menu()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();

        $data_menu = DB::table('loaithucdon')->get();
        return view('admin_pages.all_cate_menu')->with('data_mes',$data_mes)->with('menu',$data_menu);
    }

    //Menu

    public function index_add_menu()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();
       
       
        
        $data_loai = DB::table('loaithucdon')->get();
        return view('admin_pages.add_menu')->with('data_mes',$data_mes)->with('cate_menu',$data_loai);
    }

    public function save_menu(Request $request)
    {
        // $this->validate($request,[
        //     'exc_menu' => 'require|mimes:xls,xlsx'
        // ]);
        $id_loaitd = $request->cate_menu;
        Session::put('id_loaitd',$id_loaitd);
        $admin_id = Session::get('admin_id');
        $id_quan = DB::table('quan')->where('id_quanli',$admin_id)->first()->id_quan;
        Session::put('id_quan',$id_quan);
        $path1 = $request->file('exc_menu')->store('temp');
        $path = storage_path('app').'/'.$path1;
        Excel::import(new ThucDonImports, $path);
        return back();

    }

    //Mon an
    public function index_add_dish()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();

        $data_loai = DB::table('loaithucdon')->get();
        return view('admin_pages.add_a_dish')->with('data_mes',$data_mes)->with('cate_menu',$data_loai);
    }

    public function save_dish(Request $request)
    {

        $admin_id = Session::get('admin_id');
        $id_quan = DB::table('quan')->where('id_quanli',$admin_id)->first()->id_quan;



        $data = array();
        $data['tenmon'] = $request->dish_name;
        $data['gia'] = $request->dish_price;
        $data['loaimon'] = $request->dish_cate;
        $data['id_loaitd'] =  $request->cate_menu;
        $data['id_quan'] =  $id_quan;
        DB::table('thucdon')->insert($data);
        return redirect('/tatca-mon');


    }

    public function all_menu()
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();
        $id_quan = DB::table('quan')->where('id_quanli',$admin_id)->first()->id_quan;
        $data_loai = DB::table('loaithucdon')->get();
       
        $data_menu = DB::table('thucdon')->where('id_quan',$id_quan)->paginate(10);
        return view('admin_pages.all_menu')->with('data_mes',$data_mes)->with('all_menu',$data_menu)->with('cate_menu',$data_loai)->with('t_id_loaitd','null');
    }

    public function filter_menu(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();
        $id_quan = DB::table('quan')->where('id_quanli',$admin_id)->first()->id_quan;
        
        $data_loai = DB::table('loaithucdon')->get();
        $id_loaitd = $request->cate_menu;
        $data_menu = DB::table('thucdon')->where('id_quan',$id_quan)->where('id_loaitd',$id_loaitd)->paginate(10);
        return view('admin_pages.all_menu')->with('data_mes',$data_mes)->with('all_menu',$data_menu)->with('cate_menu',$data_loai)->with('t_id_loaitd',$id_loaitd);
    }



    public function index_edit_dish($id_thucdon)
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();

        $data_loai = DB::table('loaithucdon')->get();

        $data_thucdon = DB::table('thucdon')->where('id_thucdon',$id_thucdon)->get();


        return view('admin_pages.edit_dish')->with('data_mes',$data_mes)->with('cate_menu',$data_loai)->with('menu',$data_thucdon);
    }

    public function update_dish($id_thucdon ,Request $request)
    {
        $admin_id = Session::get('admin_id');
        $id_quan = DB::table('quan')->where('id_quanli',$admin_id)->first()->id_quan;



        $data = array();
        $data['tenmon'] = $request->dish_name;
        $data['gia'] = $request->dish_price;
        $data['loaimon'] = $request->dish_cate;
        $data['id_loaitd'] =  $request->cate_menu;
        $data['id_quan'] =  $id_quan;
        DB::table('thucdon')->where('id_thucdon',$id_thucdon)->update($data);
        
        return redirect('/tatca-mon');
    }

    public function user_menu($id_datban)
    {
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $data_mes = DB::table('datban')->join('quan','quan.id_quan','datban.id_quan')->join('khachhang','khachhang.id_khachhang','datban.id_khachhang')->where('quan.id_quanli',$admin_id)->orderBy('id_datban','DESC')->get();

        $data_menu = DB::table('datmon')->join('thucdon','thucdon.id_thucdon','datmon.id_thucdon')->where('datmon.id_datban',$id_datban)->paginate(10);
        return view('admin_pages.menu_user_order')->with('data_mes',$data_mes)->with('data_menu',$data_menu);
    }



   
}
