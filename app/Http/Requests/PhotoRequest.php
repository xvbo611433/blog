<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //开启验证
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //设置验证
        return [
            'photo'     => 'required',
            'photoname' => 'required',
            'photo_id'  => 'required',

        ];
    }
    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        //返回验证信息
        return [
            'photo.required'     => '图片不能为空',
            'photoname.required' => '图片名称不能为空',
            'photo_id.required'  => '请选择相册',
        ];
    }
}
