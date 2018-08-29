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

        return view('home.login.userinfo',['title'=>'个人详情','data'=>$data]);
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
    if($res){
            return redirect('/')->with('success','注册成功');
        }else{
            return redirect('/')->with('success','注册成功');
        }
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
            //为避免存入的文件信息混乱 不好查找 建立新目录
            $dir = './uploads/'.date('Ymd',time());
            // 将文件移动到指定位置
            $profile->move($dir,$name);
            // 拼接图片存储路径
            $str = $dir.'/'.$name;
            // 对图片路径进行处理
            $tep = ltrim($str,'.');
        }
        $id = session('id');
        $res = DB::table('blog_info')->where('uid', $id)->update(['profile' => $tep]);
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
