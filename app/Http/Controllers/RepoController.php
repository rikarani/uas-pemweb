<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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
}
