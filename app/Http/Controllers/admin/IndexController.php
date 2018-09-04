<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use Hash;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        //后台首页
        // $data = $request->session()->all();
        return view('admin/index/index', ['title'=>'后台首页']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit()
    {
        return view('admin.index.edit',['title'=>'修改密码']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
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
        // 获取原密码信息
        $pwd = $arr['pwd'];
        $repwd = $arr['repwd'];
        $upwd = $arr['upwd'];
        // 判断两次密码是否一致
        if($repwd != $upwd){
            return back()->with('error','两次密码不一致');
        }
        // 获取session用户信息
        $data = session('login');

       Hash::check($pwd, $data['upwd']);
           //密码加密
//           $password = Hash::make($upwd);
//


        // 更新到数据库
        $res =  DB::table('user')->where('id', $data['id'])->update(['upwd'=>$upwd]);
        if($res){
            return redirect('/admin/login')->with('success','您的密码有更改,请重新登录');
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
