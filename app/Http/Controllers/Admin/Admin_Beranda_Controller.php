<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin_Beranda_Controller extends Controller
{
    //

    public function index(){


        return view('users/admin/beranda');
    }

}
