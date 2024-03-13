<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    //
    // public function index()
    // {
    //     $data = array('title' => 'Home Page');
    //     return view ('index',$data);
    // }
    public function index()
    {
        return view ('index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data   = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
            // return redirect('/home');
        } else {
            return redirect()->route('index')->with('failed','Email atau password salah.');
        }
    }

    public function logout(){
        // dd('logout');
        Auth::logout();
        return redirect()->route('index')->with('success', 'Kamu berhasil logout.');
    }

    public function signup(){
        return view ('signup');
    }

    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:3',
        ]);

        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'role'    => "kasir",
            'password'=> Hash::make($request->password),
        ]);

        $login   = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($login)){
            // return redirect()->route('admin.home');
            return redirect()->route('index')->with('success','Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->route('index')->with('failed','Email atau password salah.');
        }
    }
}
