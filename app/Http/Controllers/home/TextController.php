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

        //渲染到模板
       return view('home/text/about',['title'=>'关于我','about'=>$about]);
    }
    public function search(Request $request)
    {
<<<<<<< HEAD
        $search = $request->input('gname',''); //接受名称
=======
        $search = $request->input('gname'); //接受名称
         // dd($search);

>>>>>>> bc617fbc86b95f33352dd14f936e9551297f5b13
        if (isset($search) && !empty($search)) {
            $goods = Good::where('gname', 'like', '%' . $search . '%')->paginate(5);
        }

        return view('home/text/search',['goods'=>$goods]);
    }
}
