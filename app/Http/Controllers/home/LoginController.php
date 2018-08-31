<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\home\Register;
use Illuminate\Http\Request;

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
        $data  = $request->except('_token', 's');
        $uname = $data['username'];
        $upwd  = $data['password'];
<<<<<<< Updated upstream
//        //检验验证码是否正确
        if (session('code') != $request->input('code')) {
            return back()->with('error', '验证码输入错误');
        }
=======
>>>>>>> Stashed changes
        $str = session('goods_url');
        $arr = explode('/', $str);
        $id  = array_pop($arr);

        //查询数据库是否存在用户
        $tem = Register::where('uname', $uname)->where('password', $upwd)->first();
        if ($tem) {
            // 取值并给session赋值
<<<<<<< Updated upstream
            session(['comment' => $tem['uname']]);
            return redirect('/home/comment/' . $id);
=======
            session(['comment' => $data]);
            return redirect('/home/comment/'.$id);
>>>>>>> Stashed changes
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
        return view('home/login/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< Updated upstream
        //获取验证码信息
        $tel_code = $request->all();
        if (session('mobile_code') != $tel_code['code']) {
            alert('验证码错误');
=======
        // 将注册信息插入数据库
        $user = new Register;
        $user->uname = $request->input('username');
        $user->password = $request->input('password');
        $res = $user->save();
        $id = $user->id;
//        session(['info'=>$user,'uname'=>$user['uname'],'password'=>$user['password']]);
        if ($res) {
            session(['id'=>$id]);
            return redirect('/home/create/'.$id)->with('success', '添加成功');
>>>>>>> Stashed changes
        } else {
            // 将注册信息插入数据库
            $user           = new Register;
            $user->username = $request->input('username');
            // $user->email = $request->input('email');
            $user->password = $request->input('password');
            // $user->tel = $request->input('tel');
            $res = $user->save();
            if ($res) {
                return redirect('/home/create/{id}')->with('success', '添加成功');
            } else {
                return back()->with('error', '添加失败');
            }

        }

    }

    public function sendMobileCode(Request $request)
    {
        // 接受请求
        $phone = $request->input('phone');
        // echo $phone;
        $mobile_code = rand(1000, 9999);
        session(['mobile_code' => $mobile_code]);
        //短信接口地址
        $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
        //参数
        $target .= "&format=json&account=C63076896&password=b3d0073c343dc7d124152531617aed98&mobile=" . $phone . "&content=" . rawurlencode("您的验证码是：" . $mobile_code . "。请不要把验证码泄露给其他人。");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $res = curl_exec($ch);
        curl_close($ch);
        echo $res;
    }
}
