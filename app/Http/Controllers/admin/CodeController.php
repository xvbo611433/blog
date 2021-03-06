<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class CodeController extends Controller
{
     public function code()
    {
       //生成验证码图片
        $builder = new CaptchaBuilder;
        //设置图片宽高及字体
        $builder->build($width = 200, $height = 50, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

        public function captcha()
    {
        //生成验证码图片的Builder对象，配置相应属性  
        $builder = new CaptchaBuilder;  
        //可以设置图片宽高及字体  
        $builder->build($width = 120, $height = 36, $font = null);  
        //获取验证码的内容  
        $phrase = $builder->getPhrase();  
        //把内容存入session  
        Session::flash('code', $phrase);  

        // Session::put('code',$phrase);

        // session(['code'=>$phrase]);

        // $request->session()->put('code',$pharse);

        //生成图片  
        header("Cache-Control: no-cache, must-revalidate");  
        header('Content-Type: image/jpeg');  
        $builder->output();
    } 
}
