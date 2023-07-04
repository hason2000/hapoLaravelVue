<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserLesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'progress'
    ];

    public static function getUserLesson($userId, $lessonId)
    {
        return UserLesson::where('user_id', $userId)->where('lesson_id', $lessonId)->first();
    }

    public function caculateProgress()
    {
        $learnedDocumentIds = Auth::user()->documents->pluck('id')->toArray();
        $documentIds = Lesson::find($this['lesson_id'])->documents->pluck('id')->toArray();
        $count = 0;
        foreach ($learnedDocumentIds as $learnedDocumentId) {
            if (in_array($learnedDocumentId, $documentIds)) {
                $count++;
            }
        }
        return $this->progress = ($count) * Config::get('lesson.max_progress_lesson') / count($documentIds);
    }
}
