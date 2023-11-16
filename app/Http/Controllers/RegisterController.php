<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register.index");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ["required"],
            "username" => ["required", "min:6", "unique:users,username"],
            "email" => ["required", "email:dns", "unique:users,email"],
            "password" => ["required", "min:8", "max:255"]
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::create($validatedData);
        return redirect("/login")->with("success", "Registrasi Berhasil");
    }
}
