<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Image;
use DB;
use App\Models\admin\Good;

class ImageController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $good = Good::orderBy('created_at', 'desc')->get();

        // 显示页面
        return view('admin.image.create',['title'=>'浏览图片','good'=>$good,'image'=>'图片浏览']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $data = Good::find($id);
        return view('admin.image.edit',['title'=>'图片修改','data'=>$data]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
       $res = Good::destroy($id);
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/image/create')->with('success', '删除成功');
        } else {
            // 失败返回添加页
            return back()->with('error', '删除失败');
        }
    }
}
