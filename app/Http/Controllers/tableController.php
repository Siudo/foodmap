<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tableController extends Controller
{
    public function index_add_table()
    {
        return view("admin_pages.add_table");
    }
}
