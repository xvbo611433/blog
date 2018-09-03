<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\admin\About;
use App\Http\Controllers\Controller;
use DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=About::get();
        //显示个人信息
        return view('admin/about/index',['title'=>'显示个人信息','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo '123';
        return view('admin/about/create',['title'=>'关于我']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $data = $request->except('_token', 's'); //获取请求
       $res = About::insert($data);
               //判断添加结果
        if ($res) {
            return redirect('admin/about')->with('success', '添加成功');
        } else {
            return back()->with('error', '失败');
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
        $data = About::find($id); //获取要修改的数据
        //渲染到模板
        return view('admin/about/edit', ['title' => '修改关于我', 'data' => $data]);
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
        $data = $request->except('_token', '_method', 's');
        // dd($data);
        $res = DB::table('blog_about')->where('id', $id)->update($data);
        //判断结果
                if ($res) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');

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
        //获取删除的数据
        $user = About::find($id);
        $res  = $user->delete();
        // 返回结果
        if ($res) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }

}
