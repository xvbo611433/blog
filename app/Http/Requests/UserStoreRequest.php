<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //开启自动验证
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
            'uname' => 'required|unique:user|regex:/^[a-zA-Z]{1,8}[\w]{5,12}$/',
            'upwd' => 'required|regex:/^[\w]{6,16}$/',
            'password'=>'required|same:upwd',
            'tel' => 'required|regex:/^1[3578]{1}\d{9}$/',
            'email' => 'required|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'uname.required'=>'用户名不能为空',
            'uname.regex'=>'用户名格式不正确',
            'uname.unique'=>'用户名已存在',
            'email.required'=>'邮箱不能为空',
            'email.regex'=>'邮箱格式不正确',
            'upwd.required'=>'密码不能为空',
            'upwd.regex'=>'密码格式不正确',
            'password.same'=>'密码格式不一致',
            'password.required'=>'确认密码不能为空',
            'tel.required'=>'电话不能为空',
            'tel.regex'=>'电话格式错误',
        ];
    }
}
