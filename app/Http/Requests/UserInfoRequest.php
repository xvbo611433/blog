<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInfoRequest extends Request
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
            'nickname' => 'required|unique:blog_info|regex:/\p{Han}/u',
            'qq' => 'required|regex:/^1[0-9]{9}$/',
            'tel' => 'required|regex:/^1[3578]{1}\d{9}$/',
            'rname' => 'required|regex:/\p{Han}/u',
            'city' => 'required|regex:/\p{Han}/u',
            'wname' => 'required|regex:/^1[0-9]{9}$/',
            'baddress'=>'required|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',

//            'email' => 'required|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',
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
            'nickname.required'=>'用户名不能为空',
            'nickname.regex'=>'用户名格式不正确',
            'nickname.unique'=>'用户名已存在',
            'tel.required'=>'电话不能为空',
            'tel.regex'=>'电话格式错误',
            'qq.required'=>'QQ号不能为空',
            'qq.regex'=>'QQ号格式不正确',
            'rname.required'=>'名字不能为空',
            'rname.regex'=>'名字格式不正确',
            'city.required'=>'城市不能为空',
            'city.regex'=>'城市格式不正确',
            'wname.required'=>'微信号不能为空',
            'wname.regex'=>'微信号格式不正确',
            'baddress.required'=>'微博账号不能为空',
            'baddress.regex'=>'微博账号格式不正确',

        ];
    }
}
