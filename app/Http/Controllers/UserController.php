<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );
        return view('admin.master.user.list', $data);
    }

    public function create(Request $request)
    {
        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> Hash::make($request->password),
            'role'    => $request->role,
        ]);
        return redirect('/user')->with('success','Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'password'=> Hash::make($request->password),
                'role'    => $request->role,
            ]);
        return redirect('/user')->with('success','Data berhasil diubah');

    }

    public function delete($id)
    {
        // $user=User::where('id', $id)->delete();
        User::where('id', $id)->delete();
    return redirect('/user')->with('success', 'Data berhasil dihapus');
    // return redirect()->route('user')->with('success','Data berhasil dihapus.');

    }
}
