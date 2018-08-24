<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Good;

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
     //渲染到模板
       return view('home/text/about',['title'=>'关于我']);
    }

}
