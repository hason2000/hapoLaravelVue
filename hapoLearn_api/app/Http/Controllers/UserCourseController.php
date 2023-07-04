<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserCourseController extends Controller
{
    public function store(Request $request)
    {
        $urlSplit = preg_split("/\//", url()->previous());
        $urlPreviousLesson = route('courses.lessons.show', [$request['course_id'], $urlSplit[sizeof($urlSplit) - 1]]);

        if ($urlPreviousLesson == url()->previous() && ($request['user_id'] != Auth::id() || $request['course_id'] != $urlSplit[sizeof($urlSplit) - 3])) {
            session()->flash('error-join-course', 'error join course');
            return redirect()->back();
        } elseif ($urlPreviousLesson == url()->previous() && $request['user_id'] == Auth::id() && $request['course_id'] == $urlSplit[sizeof($urlSplit) - 3]) {
            UserCourse::create($request->all());
            return redirect()->back();
        } elseif ($request['course_id'] != array_pop($urlSplit) || Auth::id() != $request['user_id']) {
            session()->flash('error-join-course', 'error join course');
            return redirect()->back();
        }

        UserCourse::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $courseId)
    {
        $urlSplit = preg_split("/\//", url()->previous());
        $urlPreviousLesson = route('courses.lessons.show', [$courseId, $urlSplit[sizeof($urlSplit) - 1]]);

        if ($urlPreviousLesson == url()->previous() && ($request['user_id'] != Auth::id() || $courseId != $urlSplit[sizeof($urlSplit) - 3])) {
            session()->flash('error-end-course', 'error end course');
            return redirect()->back();
        } elseif ($urlPreviousLesson == url()->previous() && $request['user_id'] == Auth::id() && $courseId == $urlSplit[sizeof($urlSplit) - 3]) {
            Auth::user()->courses()->updateExistingPivot($courseId, ['status' => Config::get('usercourse.learned_status')]);
            return redirect()->back();
        } elseif ($courseId != array_pop($urlSplit) || Auth::id() != $request['user_id']) {
            session()->flash('error-end-course', 'error end course');
            return redirect()->back();
        }

        Auth::user()->courses()->updateExistingPivot($courseId, ['status' => Config::get('usercourse.learned_status')]);
        return redirect()->back();
    }
}
