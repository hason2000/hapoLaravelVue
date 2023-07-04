<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $courses = $user->courses;
        if ($courses->count() > Config::get('user.limit_course_in_page')) {
            $courses = $courses->take(Config::get('user.limit_course_in_page'));
        }
        return view('users.show', compact('user', 'courses'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('file_img')) {
            Storage::put('public', $request['file_img']);
            $url = asset(Storage::url($request['file_img']->hashName()));
            $request->merge(["avata_url" => $url]);
        }
        User::find($id)->update($request->all());
        return redirect()->route('users.show', $id);
    }
}
