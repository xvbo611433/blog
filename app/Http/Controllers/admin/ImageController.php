<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Image;
use DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有数据 分配到页面
        $data = Image::all();
        return view('admin.image.index',['title'=>'图片浏览','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示页面
        return view('admin.image.create',['title'=>'添加图片']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收头像信息
        $profile = $request->file('image');
        // 判断头像是否上传
        if($request->hasFile('image')){
            // 为防止文件信息重复随机文件名
            $temp_name = str_random(18);
            // 防止文件格式错误  获取文件后缀名
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
            //将文件名路径存储到数据
            $data['image'] = $tep;

        }
        // 添加数据库
        $image = new Image;
        $image->image = $data['image'];
        $res = $image->save();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/image')->with('success', '添加成功');
        } else {
            // 失败返回添加页
            return back()->with('error', '添加失败');
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
        $data = Image::find($id);
        return view('admin.image.edit',['title'=>'图片修改','data'=>$data]);
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
        // 接收头像信息
        $profile = $request->file('image');
        // 判断头像是否上传
        if($request->hasFile('image')){
            // 为防止文件信息重复随机文件名
            $temp_name = str_random(18);
            // 防止文件格式错误  获取文件后缀名
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
            //将文件名路径存储到数据
            $data['image'] = $tep;
            }
        // 将数据更新到数据库
        $res = DB::table('blog_image')->where('id', $id)->update($data);
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/image')->with('success', '修改成功');
        } else {
            // 失败返回添加页
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
       $res = Image::destroy($id);
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/image')->with('success', '删除成功');
        } else {
            // 失败返回添加页
            return back()->with('error', '删除失败');
        }
    }
}