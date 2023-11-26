<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        dd($request->all());
        return view("dashboard.lesson.index", [
            "page" => "Materi",
            "lessons" => Lesson::all()->sortBy("course_id")
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
            "name" => "required|max:255",
            "description" => "required|max:255",
            "course_id" => "required"
        ]);

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
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $materi)
    {
        Lesson::destroy($materi->id);
        return redirect("/dashboard/materi")->with("success", "Berhasil Menghapus Materi");
    }
}
