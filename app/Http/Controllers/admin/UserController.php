<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;
use DB;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收数据
        $search = $request->input('search', '');
        // 接收数据条数
        $count = $request->input('count',5);

        // 根据用户搜索查询
        $users = User::where('uname','like','%'.$search.'%')->paginate($count);

        return view('admin.user.list',['title'=>'用户列表','users'=>$users,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',['title'=>'用户添加']);
    }

    /**
     * 添加用户信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // 向数据库插入用户信息
        $users = new User;
        $users -> uname = $request->input('uname');
        $users -> upwd = Hash::make($request->input('upwd'));
        $users -> tel = $request->input('tel');
        $users -> email = $request->input('email');

        $users -> status = $request->input('status');

        $res = $users->save();

        if($res){

            return redirect('/admin/user')->with('success','添加成功');
        }else{

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
        $data = User::find($id);
        return view('admin.user.edit',['data'=>$data,'title'=>'修改用户']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // 获取修改信息
//        $data = User::find($id);
        $this->validate($request, [
            'tel' => 'required|regex:/^1[3578]{1}\d{9}$/',
            'email' => 'required|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',
        ],[
            'email.required'=>'邮箱不能为空',
            'email.regex'=>'邮箱格式不正确',
            'tel.required'=>'电话不能为空',
            'tel.regex'=>'电话格式错误',
        ]);
        $data = $request->only('uname','tel','email','status');

        // 将信息更新到数据库
        $res = DB::table('user')->where('id', $id)->update($data);

        if($res){
            return redirect('/admin/user')->with('success', '修改成功');
        }else{
            return back()->with('success', '修改失败');
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
        // 删除用户
        $res = User::destroy($id);

        if($res){
            return redirect('/admin/user')->with('success', '删除成功');
        }else{
            return redirect('/admin/user')->with('success', '删除失败');
        }
    }
}
