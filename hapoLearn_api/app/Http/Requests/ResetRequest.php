<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_reset' => 'required|max:32|min:6',
            'confirm_password_reset' => 'same:password_reset'
        ];
    }

    public function messages()
    {
        return [
            'password_reset.required' => 'Vui lòng điền password!!!',
            'password_reset.max' => 'độ dài không hợp lệ(từ 8-32 kí tự)',
            'password_reset.min' => 'độ dài không hợp lệ(từ 8-32 kí tự)',
            'confirm_password_reset.same' => 'mật khẩu không khớp'
        ];
    }
}
