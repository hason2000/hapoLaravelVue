<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'login_username' => 'required|string|max:32|min:6',
            'login_password' => 'required|max:32|min:6'
        ];
    }

    public function messages()
    {
        return [
            'login_username.required' => 'Vui lòng điền username!!!',
            'login_username.max' => 'độ dài không hợp lệ(từ 8-32 kí tự)',
            'login_username.min' => 'độ dài không hợp lệ(từ 8-32 kí tự)',
            'login_password.required' => 'Vui lòng điền password!!!',
            'login_password.max' => 'độ dài không hợp lệ(từ 8-32 kí tự)',
            'login_password.min' => 'độ dài không hợp lệ(từ 8-32 kí tự)'
        ];
    }
}
