<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Recycle;
use App\models\admin\User;


class RecycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // 获取删除的数据 显示到页面
        $data = User::onlyTrashed()->get();

        return view('admin.recycle.index',['title'=>'回收站','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRollback($id)
    {
        //单条恢复
        $res = User::withTrashed()->where('id', $id)->restore();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/user')->with('success', '恢复成功');
        } else {
            // 失败返回
            return back()->with('error','恢复失败');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRecover()
    {
        //恢复全部
        $res = User::withTrashed()->restore();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/user')->with('success', '恢复成功');
        } else {
            // 失败返回
            return back()->with('error','恢复失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroytime($id)
    {

        $res = User::withTrashed()->where('id',$id)->forceDelete();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/user')->with('success', '删除成功');
        } else {
            // 失败返回
            return back()->with('error','删除失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy()
    {
        $res = User::withTrashed()->where('deleted_at','>',1)->forceDelete();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/user')->with('success', '删除成功');
        } else {
            // 失败返回
            return back()->with('error','删除失败');
        }
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


}
