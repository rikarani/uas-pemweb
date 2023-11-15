<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get("/posts", [PostController::class, "index"]);
Route::get("/post/{post:slug}", [PostController::class, "show"]);
Route::get("/posts/author/{user:username}", [PostController::class, "postsByAuthor"]);
Route::get("/posts/category/{category:slug}", [PostController::class, "postInCategory"]);

Route::get("/categories", [CategoryController::class, "index"]);
