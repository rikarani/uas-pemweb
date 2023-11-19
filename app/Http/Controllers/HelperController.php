<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;

class HelperController extends Controller
{
    public function post(Request $request): JsonResponse
    {
        $slug = SlugService::createSlug(Post::class, "slug", $request->title);

        return response()->json(["slug" => $slug]);
    }

    public function category(Request $request): JsonResponse
    {
        $slug = SlugService::createSlug(Category::class, "slug", $request->name);

        return response()->json(["slug" => $slug]);
    }
}
