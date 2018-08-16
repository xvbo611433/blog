<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use App\Models\Admin\Good;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Comment;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $search = $request->input('search', ''); //接受文章名称
        // $id = $request->input('id', ''); //接收文章类
        $count = Good::count();
        $page_count = $request->input('page_count', 5);
        $goods = new Good(); //创建数据对象
        if (isset($search) && !empty($search)) {
            $goods = $goods->where('gname', 'like', '%' . $search . '%');
        }

        $cate_data = Cate::get();
        // dump($cate_data);die;
        $data = $goods->paginate($page_count);
        

        return view('admin/good/index', ['title' => '文章列表', 'data' => $data, 'cate_data' => $cate_data, 'search' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_data = Cate::getDatecate();
        return view('admin/good/create', ['title' => '文章添加', 'cate_data' => $cate_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $good = new Good;
        $good->gname = $request->input('gname');
        $good->id = $request->input('id');
        $good->content = $request->input('content');
        $res = $good->save();
        if ($res) {
            return redirect('admin/good')->with('success', '添加成功');
        } else {
            return back()->with('error', '失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gid)
    {
        $data = good::find($gid);
        $cate_data = Cate::getDatecate();

        return view('admin/good/edit', ['data' => $data, 'title' => '文章修改', 'cate_data' => $cate_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gid)
    {
        $data = $request->except('_token', '_method', 's');

        if ($request->hasFile('gpic') == true) {
            $pic = $request->file('gpic');
            $temp_name = time() + rand(10000, 99999);
            $hz = $pic->getClientOriginalExtension();
            $file = $temp_name . '.' . $hz;
            $dir = './upload/' . date('Ymd', time());
            $filename = ltrim($dir . '/' . $file, '.');
            $j = $pic->move($dir, $filename); //执行上传

            $data['gpic'] = '/upload/' . date('Ymd', time()) . '/' . $temp_name . '.' . $hz;
        }

        $res = DB::table('blog_goods')->where('gid', $gid)->update($data);

        //做判断
        if ($res) {
            DB::commit(); //提交事务
            return redirect('/admin/good')->with('success', '修改成功');

        } else {
            DB::rollBack();
            return back()->with('error', '修改失败');

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gid)
    {
        //获取要删除的对象

        $good = Good::find($gid);

        $res = $good->delete();
        // 返回结果
        if ($res) {
            return redirect('admin/good')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}
