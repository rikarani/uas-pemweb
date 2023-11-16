<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.index");
    }

    public function authenticate(Request $request)
    {
        $login = $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();

            return redirect()->intended("/dashboard");
        }

        return back()->with("fail", "Login Gagal");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
