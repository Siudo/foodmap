<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class DatBanController extends Controller
{
    public function index_datban($id_quan)
    {
        $data = DB::table('quan')->where('id_quan',$id_quan)->get();
       return view('user_pages.datban_user')->with('data_quan',$data);
    }
}
