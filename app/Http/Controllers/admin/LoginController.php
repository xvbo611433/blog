<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\user;
use DB;
use Session;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        return view('admin/login/index', ['title' => '后台用户登录']);
    }

    public function postGologin(Request $request)
    {
        //获取用户输入信息
        $data = $request->except('_token','s');
        $uname = $data['uname'];
        $upwd = $data['upwd'];
<<<<<<< Updated upstream
        //检验验证码是否正确
        if (session('code') != $request->input('code')) {
            return back()->with('error', '验证码输入错误');
        }
        //查询数据库是否存在用户
        $tem = user::where('uname', $uname)->first();

        // //验证用户名是否存在
        if (empty($tem)) {
            return back()->with('error', '用户名不存在');
        }
        // //验证密码
        if ($upwd != $tem['upwd']) {
            return back()->with('error', '密码错误');
        } else {
            // //取值并给session赋值

            // dump($info);die;
            session::put(['login' => $tem['uname']]);
=======

//        //检验验证码是否正确
//        if(session('code') != $request -> input('code')){
//            return back()->with('error','验证码输入错误');
//        }
        // 验证用户名是否为空
        if(empty($uname)){
            return back()->with('error','用户名不能为空');
        }
        //查询数据库是否存在用户
        $tem = user::where('uname',$uname)->first();
        // //验证用户名是否存在
        if($tem['uname'] != $uname){
            return back()->with('error','用户名不存在');
        }
         //验证密码
        $res = Hash::check($upwd, $tem['upwd']);
        if($res && $tem){
            session(['login'=>$tem]);
>>>>>>> Stashed changes
            return redirect('/admin/user');
        }else{
            return back()->with('error','密码错误');
        }

        }

    public function getOutlogin()
    {
        //清除session并跳转页面
        session(['login' => null]);
        return redirect('/login');
    }

}
