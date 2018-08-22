<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use App\Models\admin\Image;
use App\Models\admin\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\ShmilyThreePresenter;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        $count = $request->input('count', 10);
        // dump($count);die;
        $good = Good::orderBy('created_at', 'desc')->paginate($count);

        $link = Link::get();
        // dd($link);


        $data = Image::all();
        // dump($cate);die;
        return view('home/index/index', ['title' => '前台首页', 'good' => $good, 'data' => $data, 'link' => $link]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gid)
    {
        //

        $essay = Good::find($gid);
        $good = Good::orderBy('created_at', 'desc')->get();
        // dump($essay);die;
        $cid = $essay->id;
        $cate_name = Cate::find($cid)->cname;
     
       // dump($cate_name);die;


        return view('/home/index/show', ['title' => '文章详情',  'essay' => $essay, 'cate_name' => $cate_name,'good'=>$good]);
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