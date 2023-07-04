<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'course_id',
        'user_id',
        'content',
        'star_rating',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public static function getReviewId($courseId)
    {
        $review = Review::where('user_id', Auth::id())->where('course_id', $courseId)->first();

        if (!is_null($review)) {
            return $review->id;
        }

        return Config::get('review.id_null');
    }

    public function getUserReview()
    {
        return User::find($this['user_id']);
    }

    public function formatDateTime()
    {
        $date = date_create($this['updated_at']);
        return date_format($date, "F d, Y") . " at " . date_format($date, "g:i a");
    }
}
