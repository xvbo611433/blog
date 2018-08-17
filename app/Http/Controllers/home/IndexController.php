<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use Illuminate\Http\Request;
use App\Models\admin\Image;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Cate::getCate();
        $good = Good::get();

        $data = Image::all();
        // dump($cate);die;
        return view('home/index/index', ['title' => '前台首页', 'cate' => $cate,'good'=>$good,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $cate = Cate::getCate();
         $good = Good::get();
         $essay = Good::find($id);
         // dump($essay);die;

        return view('/home/index/show',['title'=>'文章详情','good'=>$good,'essay'=>$essay,'cate'=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
