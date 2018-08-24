<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\home\Register;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 显示登陆页面
        return view('home.login.login');
    }

    /**
     * 登录验证
     *
     *
     *
     */
    public function info(Request $request)
    {
        // 获取用户输入信息
        $data = $request->except('_token','s');
        $uname = $data['username'];
        $upwd = $data['password'];
//        //检验验证码是否正确
//        if (session('code') != $request->input('code')) {
//            return back()->with('error', '验证码输入错误');
//        }
        $str = session('goods_url');
        $arr = explode('/', $str);
        $id = array_pop($arr);

        //查询数据库是否存在用户
        $tem = Register::where('username', $uname)->where('password',$upwd)->first();
        if($tem){
            // 取值并给session赋值
            session(['login' => $tem['username']]);
            return redirect('/home/comment/'.$id);
        } else {
            return back()->with('error', '密码错误');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示注册页面
        return view('home.login.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 将注册信息插入数据库
        $user = new Register;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->tel = $request->input('tel');
        $res = $user->save();
        if($res){
            return redirect('/login')->with('success','添加成功');
        }else{
            // 失败返回
            return back()->with('error','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
