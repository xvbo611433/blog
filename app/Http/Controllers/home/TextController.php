<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Good;
use App\Models\admin\About;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function time()
    {
        //获取文章数据倒序;
        $time=Good::orderBy('created_at', 'desc')->get();
        // 渲染到模板
       return view('home/text/time',['title'=>'时间轴','time'=>$time]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        //获个人信息
        $about=About::find(4);
        // dd($about);
     //渲染到模板
       return view('home/text/about',['title'=>'关于我','about'=>$about]);
    }
    public function search(request $request)
    {
        $search = $request->input('gname', ''); //接受名称
        // dd($search);

        if (isset($search) && !empty($search)) {
            $goods = Good::where('gname', 'like', '%' . $search . '%')->paginate(5);
        }
        // dd($goods);
        return view('home/text/search',['goods'=>$goods]);
    }
}
