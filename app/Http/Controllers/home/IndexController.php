<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use App\Models\admin\Image;
use App\Models\admin\Link;
use Illuminate\Http\Request;
use App\Models\admin\Comment;
use App\Http\Controllers\ShmilyThreePresenter;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取文章按时间排序,分页
        $good = Good::orderBy('created_at', 'desc')->paginate(8);
        //获取链接

        $link = Link::get();

        $data = Image::all();

        return view('home/index/index', ['title' => '前台首页', 'good' => $good, 'data' => $data, 'link' => $link]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$gid)
    {
        $arr = $request->url();
        session(['goods_url'=>$arr]);
        // 文章详情
        $essay = Good::find($gid);
        // 根据时间倒叙排序 获取所有文章
        $good = Good::orderBy('created_at', 'desc')->get();
        // 获取文章详情
        $good_comment = Good::find($gid);
        // 获取文章评论信息
        $comment = $good_comment->goods_comment;
        $cid = $essay->id;
        // 类别
        $cate_name = Cate::find($cid)->cname;
        return view('/home/index/show', ['title' => '文章详情',  'essay' => $essay, 'cate_name' => $cate_name,'good'=>$good,'comment'=>$comment]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function list(Request $request, $id)
    {
        //获取相应类别下文章
        $good = Good::where('id', $id)->paginate(7);
        //获取当前分类 名称
        $cname = Cate::find($id)->cname;

        return view('home/index/list', ['title' => '列表页', 'good' => $good, 'cname' => $cname]);
    }
}