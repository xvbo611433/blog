<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\user;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //渲染到模板
        return view('admin/login/index', ['title' => '后台用户登录']);
    }

    public function postGologin(Request $request)
    {
        //获取用户输入信息
        $data  = $request->except('_token', 's');
        $uname = $data['uname'];
        $upwd  = $data['upwd'];
        //检验验证码是否正确
        if (session('code') != $request->input('code')) {
            return back()->with('error', '验证码输入错误');
        }
        //查询数据库是否存在用户
        $tem = user::where('uname', $uname)->first();
        if (empty($tem)) {
            return back()->with('error', '用户名不存在');
        }

        // 验证密码
        if ($upwd == $tem['upwd']) {
            // 取值并给session赋值
            session(['login' => $tem]);
            return redirect('/admin/index');
        } else {
            return back()->with('error', '密码错误');
        }
    }

    public function getOutlogin()
    {
        //清除session并跳转页面
        session(['login' => null]);
        return redirect('admin/login');
    }

}
