<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardMateriController;
use App\Models\Category;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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

Route::get("/posts", [PostController::class, "index"]);
Route::get("/post/{post}", [PostController::class, "show"]);

Route::get("/categories", function () {
    return view("categories", [
        "page" => "Kategori",
        "title" => "Kategori Postingan",
        "categories" => Category::all()
    ]);
});

Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);

Route::get("/login", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::middleware("auth")->get("/dashboard", function () {
    return view("dashboard.index", ["page" => "Dashboard"]);
});

Route::get("/dashboard/posts/generate", [DashboardPostController::class, "generate"]);
Route::resource("/dashboard/posts", DashboardPostController::class)->middleware("auth");

Route::get("/dashboard/categories/generate", [AdminCategoryController::class, "generate"]);
Route::resource("/dashboard/categories", AdminCategoryController::class)->except("show")->middleware("admin");

Route::resource("/dashboard/users", AdminUserController::class)->except("show")->middleware("admin");

Route::get("/repo", [RepoController::class, "index"]);
Route::get("/repo/{course}", [RepoController::class, "show"]);

Route::resource("/dashboard/materi", DashboardMateriController::class);
