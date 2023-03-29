<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function check(Request $request)
    {
        // $data = $request->only('email', 'password');
        // $check = Auth::guard('')->attempt($data);
        // if ($check) {
        //     return redirect()->route('admin.home');
        // } else {
        //     return redirect()->route('admin.login')->with('error', 'faile');
        // }
        $email = $request->email;
        $password = $request->password;
        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();
        if ($result) {
            $request->session()->put('user_id', $result->id);
            $request->session()->put('user_name', $result->name);
            $request->session()->put('user_status', $result->status);
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function logout()
    {
        if (session()->has('user_id')) {
            session()->pull('user_id');
        }
        return redirect()->route('admin.login');
    }
}
