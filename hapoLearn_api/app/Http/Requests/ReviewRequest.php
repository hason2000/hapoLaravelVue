<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'star_rating' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'star_rating.required' => 'Vui lòng chọn sao cho khóa học'
        ];
    }
}
