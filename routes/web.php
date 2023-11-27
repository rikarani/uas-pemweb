<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardMateriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RepoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("index", ["page" => "Home"]);
});

Route::get("/about", function () {
    return view("about", ["page" => "About"]);
});

Route::get("/login", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::get("/course/{lesson}/download", [RepoController::class, "download"]);
Route::get("/course", [RepoController::class, "index"]);
Route::get("/course/{course}", [RepoController::class, "show"]);

Route::middleware("auth")->get("/dashboard", function () {
    return view("dashboard.index", ["page" => "Dashboard"]);
});

Route::resource("/dashboard/users", AdminUserController::class)->except("show")->middleware("admin");
Route::resource("/dashboard/materi", DashboardMateriController::class)->except("show");
