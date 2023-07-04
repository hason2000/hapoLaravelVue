<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email_reset' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'email_reset.required' => 'email không được để trống',
            'email_reset.email' => 'Không đúng định dạng email'
        ];
    }
}
