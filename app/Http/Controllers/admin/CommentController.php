<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;

class CommentController extends Controller
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
        $data = Comment::where('comment','like','%'.$search.'%')->paginate(5);
        return view('admin.comment.index',['title'=>'浏览评论','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create',['title'=>'添加评论']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Comment;
        // 判断头像是否上传
        if($request->hasFile('profile')){
            // 接收头像信息
            $profile = $request->file('profile');
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
            $tep = ltrim($str,'.') ;
            $data['profile'] = $tep;

        }
        $data->cname = $request->input('cname');
        $data->profile = $data['profile'];
        $data->status = $request->input('status');
        $data->comment = $request->input('comment');
        $res = $data->save();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/comment')->with('success', '添加成功');
        } else {
            // 失败返回添加页
            return back()->with('error', '添加失败');
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
        $res = Comment::destroy($id);
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/comment')->with('success', '删除成功');
        } else {
            // 失败返回添加页
            return back()->with('error', '删除失败');
        }
    }
}
