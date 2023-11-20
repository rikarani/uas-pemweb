<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;

class AdminCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.categories.index", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.categories.create", [
            "page" => "Tambah Kategori Baru"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name" => ["required", "unique:categories,name"],
            "slug" => ["required"]
        ]);

        $validatedData["name"] = ucwords($validatedData["name"]);

        Category::create($validatedData);
        return redirect("/dashboard/categories")->with("success", "Kategori Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("dashboard.categories.edit", [
            "page" => "Edit Kategori",
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            "name" => ["required", "unique:categories,name"],
            "slug" => ["required"]
        ]);

        $validatedData["name"] = ucwords($validatedData["name"]);

        Category::where("id", $category->id)->update($validatedData);
        return redirect("/dashboard/categories")->with("success", "Kategori Berhasil Diedit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect("/dashboard/categories")->with("success", "Kategori Berhasil Dihapus");
    }

    public function generate(Request $request): JsonResponse
    {
        $slug = SlugService::createSlug(Category::class, "slug", $request->name);

        return response()->json(["slug" => $slug]);
    }
}
