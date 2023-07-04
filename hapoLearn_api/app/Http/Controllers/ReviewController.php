<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        Review::create($request->all());
        return redirect()->route('courses.show', $request['course_id'])->with('addReviewSuccess', 'add review success');
    }

    public function update(ReviewRequest $request, $id)
    {
        Review::find($id)->update($request->all());
        return redirect()->route('courses.show', $request['course_id'])->with('addReviewSuccess', 'add review success');
    }
}
