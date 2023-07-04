<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'link',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_tag', 'tag_id', 'course_id');
    }
}
