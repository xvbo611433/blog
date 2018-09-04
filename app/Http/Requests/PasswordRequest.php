<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
            'password' => 'required|regex:/^\S{6,16}$/',
            'reupwd'=>'same:password'
        ];
    }
        public function messages()
    {
        return [
            'password.required'=>'请输入密码',
            'password.regex'=>'密码格式不正确',
            'reupwd.same'=>'两次密码不一致'
        ];
    }
}
