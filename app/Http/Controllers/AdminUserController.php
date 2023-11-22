<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.users.index", [
            "page" => "Manage User",
            "users" => User::all()->except(auth()->user()->id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.users.create", [
            "page" => "Tambah User"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => "required|unique:users,username|min:6|max:255",
            "email" => "required|email:dns",
            "password" => ["required", Password::min(8)->letters()->numbers()],
        ]);

        $validatedData["is_admin"] = $request->is_admin;

        User::create($validatedData);
        return redirect("/dashboard/users")->with("success", "Berhasil Menambahkan User");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("dashboard.users.edit", [
            "page" => "Edit User",
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            "password" => Password::min(8)->letters()->numbers()
        ];

        if ($request->name != $user->name) {
            $rules["name"] = "required|max:255";
        }

        if ($request->username != $user->username) {
            $rules["username"] = "required|unique:users,username|min:6|max:255";
        }

        if ($request->email != $user->email) {
            $rules["email"] = "required|email:dns";
        }

        $validatedData = $request->validate($rules);
        $validatedData["password"] = Hash::make($request->password);
        $validatedData["is_admin"] = $request->is_admin;

        User::where("id", $user->id)->update($validatedData);
        return redirect("/dashboard/users")->with("success", "Berhasil Mengupdate User");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect("/dashboard/users")->with("success", "Berhasil Menghapus User");
    }
}
