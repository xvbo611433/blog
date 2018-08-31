<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\models\admin\Photo;
use App\models\admin\PhotoType;
use DB;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($photo_id)
    {   
        //获取相册中的图片
        $data = Photo::where('photo_id', $photo_id)->get();
        // 获取相册信息
        $phototype = Phototype::get();
        //渲染到模板
        return view('admin/photo/index', ['title' => '浏览相册', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //获取相册信息

        $phototype = Phototype::get();
        //渲染到模板
        return view('admin/photo/create', ['title' => '相册管理', 'phototype' => $phototype]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(PhotoRequest $request)
    {
        //获取请求
        $data = $request->except('_token');
        // dd($data);
        //保存到数据库
        $photo            = new Photo;
        $photo->photoname = $request->input('photoname');
        $photo->photo_id  = $request->input('photo_id');
        $photo->photodesc = $request->input('photodesc');
        $photo->photo     = $request->input('photo');
        $res              = $photo->save();
        //判断
        if ($res) {
            return redirect('admin/photo/create')->with('success', '添加成功');
        } else {
            return back()->with('error', '失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getType(Request $request)
    {
        //渲染到模板
        return view('admin/photo/type', ['title' => '添加相册']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postType(request $request)
    {
        //获取请求
        $data = $request->except('_token');
        // dd($data);
        //保存数据
        $res = PhotoType::insert($data);
        //判断
        if ($res) {
            return redirect('/admin/photo/create')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        //获得要修改的图片信息
        $data      = Photo::find($id);
        $phototype = PhotoType::get();
        //渲染到模板
        return view('admin/photo/edit', ['title' => '修改图片信息', 'data' => $data, 'phototype' => $phototype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        //获得要修改的数据
        $data = $request->except('_token', '_method', 's');

        // dd($data);
        //修改数据
        $res = DB::table('blog_photos')->where('id', $id)->update($data);

        //做判断
        if ($res) {
            return redirect('/admin/photo/create')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete($id)
    {
        //获得要删除图片信息
        $photo = Photo::find($id);
        $res   = $photo->delete();
        // dd($res);
        // 返回结果
        if ($res) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($photo_id)
    {
        //获取要删除相册的信息
        $photos = Photo::where('photo_id', '=', $photo_id)->first();
        //判断相册中是否有图片
        $data   = $photos['photo_id'];
        if ($data == $photo_id) {
            return back()->with('error', '有图片不能删除');
        }
        //执行删除操作
        $res = PhotoType::destroy($photo_id);
        //返回结果
        if ($res) {
            return redirect('/admin/photo/create')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}
