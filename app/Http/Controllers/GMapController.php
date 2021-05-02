<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class GMapController extends Controller
{
    public function index()
    {
        $marker_map = DB::table('vitri')->join('quan','quan.id_quan','vitri.id_quan')->get();
     
        return view('user_pages.googlemap')->with('data_marker',$marker_map);
    }
}
