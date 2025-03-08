<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('resiko.index');
        }

        return redirect()->back()
            ->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success','Berhasil logout');
    }
}
