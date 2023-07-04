<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Lesson;
use App\Models\UserDocument;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDocumentController extends Controller
{
    public function store(Request $request)
    {
        UserDocument::create($request->all());
        $document = Document::find($request['document_id']);
        $lesson = Lesson::find($document['lesson_id']);
        $userLesson = UserLesson::getUserLesson(Auth::id(), $document['lesson_id']);

        if (is_null($userLesson)) {
            $data = [
                'user_id' => Auth::id(),
                'lesson_id' => $document['lesson_id'],
            ];
            $userLessonId = UserLesson::create($data)->id;
            $userLesson = UserLesson::find($userLessonId);
        }

        $userLesson->caculateProgress();
        $userLesson->update();
        return redirect()->route('courses.lessons.show', [$lesson['course_id'], $document['lesson_id']]);
    }
}
