<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use App\Models\admin\Link;
use DB;
use Illuminate\Http\Request;

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
        $good = Good::orderBy('created_at', 'desc')->paginate(7);
        //获取友情链接
        $link = Link::get();
        //轮播图
        $data = Good::where('status', 0)->orderBy('created_at', 'desc')->paginate(5);
        //渲染到模板
        return view('home/index/index', ['title' => '微博客', 'good' => $good, 'data' => $data, 'link' => $link]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $gid)
    {

        $arr = $request->url();
        session(['goods_url' => $arr]);
        // 文章详情
        $essay = Good::find($gid);
        // 根据时间倒叙排序 获取所有文章
        $good = Good::orderBy('created_at', 'desc')->get();
        // 获取文章评论信息
        $comment = $essay->goods_comment;
        $cid     = $essay->id;
        // 类别
        $cate_name = Cate::find($cid)->cname;
        //获取下一篇id
        $next      = DB::table('blog_goods')->where('gid', '>', $gid)->min('gid');
        $next_name = Good::find($next);
        //获取上一篇id
        $last = DB::table('blog_goods')->where('gid', '<', $gid)->max('gid');
        // dd($last);
        $last_name = Good::find($last);
        return view('/home/index/show',
            [
                'essay'     => $essay,
                'cate_name' => $cate_name,
                'comment'   => $comment,
                'good'      => $good,
                'last_name' => $last_name,
                'next_name' => $next_name,
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function list(Request $request, $id) {
        //获取相应类别下文章
        $good = Good::where('id', $id)->paginate(7);
        //获取当前分类 名称
        $cname = Cate::find($id)->cname;
        //渲染到模板
        return view('home/index/list', [ 'good' => $good, 'cname' => $cname]);
    }

    protected function next($gid)
    {

    }
}
