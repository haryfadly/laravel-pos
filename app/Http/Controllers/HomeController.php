<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    //
    public function dashboard()
    {
        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );
        return view('admin.master.user.list', $data);
    }
}
