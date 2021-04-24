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
    
}
