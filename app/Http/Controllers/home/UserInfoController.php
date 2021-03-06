<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\home\Register;
use App\Models\home\UserInfo;
use DB;
use App\Http\Requests\UserInfoRequest;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $data = register::find($id);
        $info = $data->info;

        //获取用户登陆信息
        $arr = session('comment');
        // 注册id
        $info_id = session('id');
        return view('home.login.userinfo',['title'=>'个人详情','data'=>$data,'info_id'=> $info_id,'info'=>$info,'arr'=>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInfoRequest $request)
    {

        // 接收数据 存入数据库
        $user = new UserInfo;
        $user->uid = $request->input('uid');
        $user->nickname = $request->input('nickname');
        $user->qq = $request->input('qq');
        $user->sex = $request->input('sex');
        $user->tel = $request->input('tel');
        $user->rname = $request->input('rname');
        $user->city = $request->input('city');
        $user->wname = $request->input('wname');
        $user->baddress = $request->input('baddress');
        $res = $user->save();
//        $id =  session('id');
        if($res){
            session(['info'=>$user]);
            $arr = ['data'=>$user];
            }else{
            $arr = ['data'=>'error'];
            }
            return $arr;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInfo(Request $request)
    {
        if($request->hasFile('profile')){
            // 接收头像信息
            $profile = $request->file('profile');
            // 为防止文件信息重复随机文件名
            $temp_name = str_random(6);
            // 获取文件后缀名
            $ext = $profile->getClientOriginalExtension();
            // 重整文件名
            $name = $temp_name.'.'.$ext;
            // 建立新目录
            $dir = './uploads/'.date('Ymd',time());
            // 将文件移动到指定位置
            $profile->move($dir,$name);
            // 拼接图片存储路径
            $str = $dir.'/'.$name;
            // 对图片路径进行处理
            $tep = ltrim($str,'.');
        }
        $data['profile'] = $tep;
        //获取用户登陆信息
        if(!empty(session('id'))){
            $id = session('id');
            $res = DB::table('blog_user')->where('id', $id)->update($data);
        }else{
            $arr = session('comment');
            $id = $arr['id'];
            $res = DB::table('blog_user')->where('id', $id)->update($data);
        }

        if($res){
            $arr = ['tep'=>$tep];
        }else{
            $arr = ['tep'=>'/home/images/aa.jpg'];
        }
        return $arr;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //获取用户登陆信息
        $arr = session('comment');
        // 注册id
        $info_id = session('id');
        // 显示修改密码页面
        $user = Register::find($info_id);
        return view('home.login.edit',['title'=>'修改密码','user'=>$user,'arr'=>$arr,'info_id'=>$info_id]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPwd(Request $request)
    {
        $this->validate($request, [
            'pwd' => 'required',
            'repwd' => 'required',
            'upwd' => 'required',
        ],[
            'pwd.required'=>'原密码不能为空',
            'repwd.required'=>'确认密码不能为空',
            'upwd.required'=>'新密码不能为空',

        ]);
        $arr = $request->except('s','_token');
        // 获取提交信息
        $pwd = $arr['pwd'];//原密码
        $upwd = $arr['upwd'];//新密码
        $repwd = $arr['repwd'];//确认密码

        // 判断两次密码是否一致
        if($repwd != $upwd){
            return back()->with('error','两次密码不一致');
        }

//        Hash::check($pwd, $user['password']);
//        //密码加密
//        $password = Hash::make($upwd);

        //获取用户登陆信息
        if(!empty(session('id'))){
            $id = session('id');
            $user = Register::find($id);
            if($user['password'] == $pwd){
                $res =  DB::table('blog_user')->where('id', $id)->update(['password'=>$upwd]);
            }

        }else{
            $arr = session('comment');
            $id = $arr['id'];
            $user = Register::find($id);
            if($user['password'] == $pwd){
                $res =  DB::table('blog_user')->where('id', $id)->update(['password'=>$upwd]);
            }

        }



        // 更新到数据库
        if($res){
            return redirect('/login')->with('success','您的密码有更改,请重新登录');
        }else{
            return back()->with('error','修改失败');
        }
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
