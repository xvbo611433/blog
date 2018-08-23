<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home/cmt/index');
        // echo "123";
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


        $data=$request->all();
        return $data;

/*        if($this->request->isAjax())    //判断是否为ajax请求
        {
            $post = $this->request->post();    //接收请求传递的数据
            dd($post);
            $post['leavetime'] = time();        //获取当前时间存入数据数组中
            $model = model('Leaveword');
            $addRes = $model->doleave($post);    //执行留言添加
            if($addRes)
            {    //判断添加留言结果
                $newdata = $model->selOne();    //查询最新留言信息
                $newdata['leavetime'] = date('Y-m-d H:i:s',$newdata['leavetime']);
                $this->success('留言成功','Index/index',$newdata,0);
            }
            else
            {
                $this->error('留言失败');
            }
        }*/
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
