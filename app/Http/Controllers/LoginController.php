<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.layout.login');
    }

    public function login(Request $request)
    {
        $user = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        if (!Auth::attempt($user)) {
            return redirect()->route('login')->with('login-error', 'invalid username or password!');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
