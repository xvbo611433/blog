<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //开启自动验证
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //设置条件
        return [

            'abs'     => 'required',
            'gname'   => 'required',
            'content' => 'required',
            'id'      => 'required',
        ];
    }

    /**
     * 自定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {

        return [
            'abs.required'     => '摘要不能问空',
            'gname.required'   => '文章名称不能为空',
            'content.required' => '文章内容不能为空',
            'id.required'      => '请选择文章类别',

        ];
    }
}
