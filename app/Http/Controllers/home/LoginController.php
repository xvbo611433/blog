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
//        //检验验证码是否正确
        //        if (session('code') != $request->input('code')) {
        //            return back()->with('error', '验证码输入错误');
        //        }
        $str = session('goods_url');
        $arr = explode('/', $str);
        $id  = array_pop($arr);

        //查询数据库是否存在用户
        $tem = Register::where('uname', $uname)->where('password', $upwd)->first();
        if ($tem) {
            // 取值并给session赋值
            session(['comment' => $tem['uname']]);
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
        //  $tel_code = $request -> all();
        //  if(session('mobile_code') != $tel_code['tel_code']){
        //     echo '验证码错误';
        // }else{
                // 将注册信息插入数据库
                        $user = new Register;
            $user->username = $request->input('username');
            // $user->email = $request->input('email');
            $user->password = $request->input('password');
            // $user->tel = $request->input('tel');
            $res = $user->save();
            if($res){
            return redirect('/')->with('success','添加成功');
            }else{
            // 失败返回
            return back()->with('error','添加失败');
            }           

                  



     
    }


    // public function sendMobileCode(Request $request)
    // {
    //     // echo '1231';
    //     $phone = $request->input('phone');
    //     // echo $phone;
    //     $mobile_code = rand(1000, 9999);
    //     session(['mobile_code' => $mobile_code]);
    //     //短信接口地址
    //     $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
    //     //参数
    //     $target .= "&format=json&account=C84648339&password=48a4059a1e557352184e46c788b8104b&mobile=" . $phone . "&content=" . rawurlencode("您的验证码是：" . $mobile_code . "。请不要把验证码泄露给其他人。");

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $target);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     $res = curl_exec($ch);
    //     curl_close($ch);
    //     echo $res;
    // }
}
