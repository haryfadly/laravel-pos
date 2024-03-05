<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $data = array('title' => 'Home Page');
        return view ('index',$data);
    }
}
