<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function formLogin()
    {
        $data['title']  =   'Login Resepsionis';

        return view('login', $data);
    }

    public function postLogin(Request $request)
    {
        $username   =   strtolower($request->username);
        $password   =   $request->password;

        $this->validate($request, [
            'username'  =>  'required',
            'password'  =>  'required',
        ],
        [
            'username.required' =>  'Username wajib diisi',
            'password.required' =>  'Password wajib diisi',
        ]);

        // Jika data ditemukan
        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            // Jika status == true / 1
            if(Auth::user()->status == TRUE) {
                return redirect()->route('home');
            } else {    // Jika status == false / 0
                Auth::logout();
                return redirect()->route('login')->with(['error' => 'Akun tidak aktif!']);
            }
        } else {    // Jika data tidak ditemukan
            Auth::logout();
            return redirect()->route('login')->with(['error' => 'Username atau Password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
