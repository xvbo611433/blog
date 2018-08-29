<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\admin\Photo;
use App\models\admin\PhotoType;
use Illuminate\Http\Request;
use DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($photo_id)
    {
        $data = Photo::where('photo_id', $photo_id)->get();

        $phototype = Phototype::get();
        return view('admin/photo/index', ['title' => '浏览相册', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {

        $data      = PhotoType::get();
        $phototype = Phototype::get();
        return view('admin/photo/create', ['title' => '相册管理', 'data' => $data, 'phototype' => $phototype]);
        // echo "123";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
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
        $data = $request->except('_token');
        // dd($data);
        $res = PhotoType::insert($data);
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
        
        $data      = Photo::find($id);
        $phototype = PhotoType::get();
        return view('admin/photo/edit', ['title' => '修改图片信息', 'data' => $data,'phototype'=>$phototype]);
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

        $photos = Photo::where('photo_id','=',$photo_id)->first();
        $data = $photos['photo_id'];
        if($data == $photo_id){
            return back()->with('error', '有文章不能删除');
        }

       $res = PhotoType::destroy($photo_id);
        if ($res) {
            // 成功返回列表页
            return redirect('/admin/photo/create')->with('success', '删除成功');
        } else {
            // 失败返回添加页
            return back()->with('error', '删除失败');
        }
    }    
}
