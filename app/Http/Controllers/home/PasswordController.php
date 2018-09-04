<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\home\Register;
use App\Http\Requests\PasswordRequest;

class PasswordController extends Controller
{
  //忘记密码
    // 1.填写用户名
    public function forget()
    {
        return view('home.password.forget');
    }

    public function doforget(Request $request)
    {
        // //获取用户输入信息

        $res = $request->input('uname');
        $data = Register::where('uname',$res)->first();

        session(['data'=>$data]);

        if($res==null){
            return back()->with('error','请输入用户名');
        }
        if(!$data){
            return back()->with('error','用户名不存在');
        }

        $code = $request->input('code');
        if($code==null){
            return back()->with('error','验证码不能为空');
        }

           if (session('code') != $request->input('code')) {
            return back()->with('error', '验证码输入错误');
        
        }else{
            return redirect('/home/forget2');
        }
        
    }


    // 2.验证身份
    public function forget2()
    {
        return view('home.password.forget2');
    }

    public function doforget2(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $res = $request->input('phone');
        if($res==null){
            return back()->with('error','手机号不能为空');
        }
        $reg = '/^1[3456789]\d{9}$/';
        $check = preg_match($reg, $res);
        if($check==0){
            return back()->with('error','手机号格式不正确');
        }

        $number = $request->input('code');
        $check = session('mobile_code');
        // dd($check);
        if($number==null){
            return back()->with('error','验证码不能为空');
        }

        if($number!=$check){
            return back()->with('error','验证码有误');
        }else{
            return redirect('/home/forget3');
        }
    }



    // 3.新密码
    public function forget3()
    {
        return view('home.password.forget3');
    }

     public function doforget3(PasswordRequest $request)
    {
        
        $data = $request->except('s','_token','reupwd');
        // dd($data);
        $uname = session('data')->uname;
        // dd($uname);
        

        //修改数据

        $res = Register::where('uname',$uname)->update($data);
        
        if($res){

            return redirect('/home/forget4');
        }else{
            return back()->with('error','修改失败');
        }

    }


    // 4.修改成功
    public function forget4()
    {
        return view('home.password.forget4');
    }
}
