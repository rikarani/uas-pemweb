<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("posts", [
            "title" => "Semua Postingan",
            "posts" => Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view("post", [
            "post" => $post
        ]);
    }

    public function postsByAuthor(User $user)
    {
        return view("posts", [
            "title" => "Postingan Dari $user->name",
            "posts" => $user->post
        ]);
    }

    public function postInCategory(Category $category)
    {
        return view("posts", [
            "title" => "Postingan di Kategori $category->name",
            "posts" => $category->post
        ]);
    }
}
