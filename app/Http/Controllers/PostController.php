<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = "";

        if (request("category")) {
            $category = Category::where("slug", request("category"))->get();
            $title = " di  " . $category[0]->name;
        }

        if (request("author")) {
            $author = User::where("username", request("author"))->get();
            $title = " oleh " . $author[0]->name;
        }

        return view("posts", [
            "page" => "Semua Postingan",
            "title" => "Semua Postingan $title",
            "posts" => Post::latest()->filter(request(["search", "category", "author"]))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view("post", [
            "post" => $post
        ]);
    }
}
