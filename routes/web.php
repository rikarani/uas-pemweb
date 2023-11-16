<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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
    return view("index");
});

Route::get("/about", function () {
    return view("about");
});

Route::get("/posts", [PostController::class, "index"]);
Route::get("/post/{post:slug}", [PostController::class, "show"]);

Route::get("/categories", [CategoryController::class, "index"]);

Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);

Route::get("/login", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::get("/dashboard", [DashboardController::class, "index"])->middleware("auth");
