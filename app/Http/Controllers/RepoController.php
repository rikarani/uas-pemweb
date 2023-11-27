<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepoController extends Controller
{
    public function index()
    {
        return view("course", [
            "page" => "Repository",
            "lessons" => Course::semester(request("semester"))->get()
        ]);
    }

    public function show(Course $course)
    {
        return view("lesson", [
            "page" => $course->name,
            "course" => $course
        ]);
    }

    public function download(Lesson $lesson)
    {
        $ext = pathinfo($lesson->materi, PATHINFO_EXTENSION);

        return Storage::download($lesson->materi, "$lesson->name.$ext");
    }
}
