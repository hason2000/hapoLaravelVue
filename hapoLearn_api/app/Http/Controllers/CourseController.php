<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::filter($request->all())->paginate(Config::get('course.items_per_page'));
        $teachers = User::teacher()->get();
        $tags = Tag::all();
        return view('courses.index', compact('courses', 'request', 'teachers', 'tags'));
    }

    public function show(Request $request, $id)
    {
        $courses = Course::take(Config::get('course.items_other_course'))->get();
        $teachers = User::teacher()->take(Config::get('user.teachers_learn_user'))->get();
        $course = Course::find($id);
        $lessons = $course->lessons()->filter($request->all())->paginate(Config::get('lesson.items_per_page'));
        $tags = $course->tags;
        $reviews = $course->reviews;
        $reviewId = Review::getReviewId($id);
        return view('courses.show', compact('courses', 'course', 'lessons', 'tags', 'teachers', 'request', 'reviews', 'reviewId'));
    }
}
