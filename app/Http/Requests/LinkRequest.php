<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//开启自动验证
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'LinkName' => 'required',
            'LinkAddress' => 'required',
            // 'LinkInfo' => 'required',
            'Explain' => 'required',
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
            'LinkName.required'=>'链接名称不能问空',

            'LinkAddress.required'=>'链接地址不能为空',

            'LinkInfo.required'=>'链接logo不能为空',
            'Explain.required'=>'链接介绍不能为空',

        ];
    }
}
