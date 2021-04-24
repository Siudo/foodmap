<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangchuController extends Controller
{
    public function index()
    {
        return view('user_pages.trangchu');
    }
}
