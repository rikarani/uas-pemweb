<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.course.index", [
            "page" => "Mata Kuliah",
            "courses" => Course::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.course.create", [
            "page" => "Tambah Mata Kuliah Baru"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "slug" => "required|unique:courses,slug",
            "description" => "required|max:255",
            "semester" => "required|numeric|min:1|max:8"
        ]);

        Course::create($validatedData);
        return redirect("/dashboard/course")->with("success", "Berhasil Menambahkan Mata Kuliah");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view("dashboard.course.edit", [
            "page" => "Edit Mata Kuliah",
            "course" => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $rules = [
            "name" => "required|max:255",
            "description" => "required|max:255",
            "semester" => "required|numeric|min:1|max:8"
        ];

        if ($request->slug != $course->slug) {
            $rules["slug"] = "required|unique:courses,slug";
        }

        $validatedData = $request->validate($rules);

        Course::where("id", $course->id)->update($validatedData);
        return redirect("/dashboard/course")->with("success", "Berhasil Mengupdate Mata Kuliah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        return redirect("/dashboard/course")->with("success", "Berhasil Menghapus Mata Kuliah");
    }

    public function generate(Request $request)
    {
        $slug = SlugService::createSlug(Course::class, "slug", $request->course);

        return response()->json(["slug" => $slug]);
    }
}
