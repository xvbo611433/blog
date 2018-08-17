<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Recycle;
use App\models\admin\Good;
use App\Models\admin\Image;

class RecycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // 获取文章删除的数据 显示到页面
        $data = Good::onlyTrashed()->where('deleted_at','>',1)->get();

        // 获取图片删除的数据 显示到页面
        $images = Image::onlyTrashed()->where('deleted_at','>',1)->get();

        return view('admin.recycle.index',['title'=>'回收站','data'=>$data,'images'=>$images]);
    }

    /**
     * 文章单条恢复
     *
     * 返回id
     */
    public function getRollback($id)
    {
        // 单条恢复
        $res = Good::withTrashed()->where('id', $id)->restore();

        if ($res) {
            // 成功返回列表页
            return redirect('/admin/good')->with('success', '恢复成功');
        } else {
            // 失败返回
            return back()->with('error','恢复失败');
        }
    }

    /**
     * 文章单条删除
     *
     * 返回ID
     */
    public function getDestroytime($id)
    {
        // 永久删除单条的
        $res = Good::withTrashed()->where('id',$id)->forceDelete();
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/good')->with('success', '删除成功');
        }else{
            // 失败返回
            return back()->with('error','删除失败');
        }
    }

    /**
     * 恢复全部
     *
     *
     * 返回受影响行数
     */
    public function getRecover()
    {
        //恢复全部
        $res = Good::withTrashed()->restore();

        $image = Image::withTrashed()->restore();
        if ($res && $image) {
            // 成功返回列表页
            return redirect('/admin/recycle')->with('success', '恢复成功');
        }else{
            // 失败返回
            return back()->with('error','恢复失败');
        }
    }


    /**
     * 清空回收站
     *
     *
     * 返回受影响行数
     */
    public function getDestroy()
    {
        // 清空回收站
        $res = Good::withTrashed()->where('deleted_at','>',1)->forceDelete();
        $image = Image::withTrashed()->where('deleted_at','>',1)->forceDelete();
        if ($res && $image) {
            // 成功返回列表页
            return redirect('/admin/recycle')->with('success', '删除成功');
        }else{
            // 失败返回
            return back()->with('error','删除失败');
        }
    }

    /**
     * 图片单条恢复
     *
     * 返回ID
     */
    public function getBack($id)
    {
        // 单条恢复
        $image = Image::withTrashed()->where('id', $id)->restore();
        if($image) {
            // 成功返回列表页
            return redirect('/admin/image/create')->with('success', '恢复成功');
        }else{
            // 失败返回
            return back()->with('error','恢复失败');
        }
    }

    /**
     * 图片单条删除
     *
     * 返回ID
     */
    public function getDelete($id)
    {
        // 永久删除单条的
        $image = Image::withTrashed()->where('id',$id)->forceDelete();

        if ($image) {
            // 成功返回列表页
            return redirect('/admin/image/create')->with('success', '删除成功');
        }else{
            // 失败返回
            return back()->with('error','删除失败');
        }
    }


}
