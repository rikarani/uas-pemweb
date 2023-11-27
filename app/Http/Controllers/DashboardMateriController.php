<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class DashboardMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.lesson.index", [
            "page" => "Materi",
            "courses" => Course::all()->groupBy("semester"),
            "lessons" => Lesson::filter(request("course"))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.lesson.create", [
            "page" => "Tambah Materi",
            "courses" => Course::all()->groupBy("semester")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "course_id" => "required",
            "name" => "required|max:255",
            "description" => "required|max:255",
            "materi" => ["required", File::types(["pdf", "doc", "docx", "ppt", "pptx", "zip"])->max("5mb")]
        ]);

        if ($request->file("materi")) {
            $validatedData["materi"] = $request->file("materi")->store("materi");
        }

        Lesson::create($validatedData);
        return redirect("/dashboard/materi")->with("success", "Berhasil Menambahkan Materi");
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $materi)
    {
        return view("dashboard.lesson.edit", [
            "page" => "Edit Materi",
            "courses" => Course::all()->groupBy("semester"),
            "lesson" => $materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $materi)
    {
        $rules = [
            "course_id" => "required",
            "name" => "required|max:255",
            "description" => "required|max:255",
            "materi" => File::types(["pdf", "doc", "docx", "ppt", "pptx", "zip"])->max("5mb")
        ];

        $validatedData = $request->validate($rules);
        if ($request->file("materi")) {
            Storage::delete($materi->materi);

            $validatedData["materi"] = $request->file("materi")->store("materi");
        }

        Lesson::where("id", $materi->id)->update($validatedData);
        return redirect("/dashboard/materi")->with("success", "Berhasil Memperbarui Materi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $materi)
    {
        Storage::delete($materi->materi);
        Lesson::destroy($materi->id);
        return redirect("/dashboard/materi")->with("success", "Berhasil Menghapus Materi");
    }
}
