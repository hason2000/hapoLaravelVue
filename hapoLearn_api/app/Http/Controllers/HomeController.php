<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $courses = Course::take(3)->get();
        $reviews = Review::take(4)->get();
        $numberLesson = Lesson::count();
        $numberUser = User::count();
        $numberCourse = Course::count();
        return view('index', compact('courses', 'reviews', 'numberCourse', 'numberLesson', 'numberUser'));
    }
}
