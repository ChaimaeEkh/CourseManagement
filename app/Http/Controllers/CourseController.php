<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
{
    $courses = Course::where('is_published', true)->get();
    return view('courses.index', compact('courses'));
}

    public function show($id)
    {
        $course = Course::with('teacher', 'comments.user')->findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
