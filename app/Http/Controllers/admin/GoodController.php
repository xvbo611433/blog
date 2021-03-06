<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodRequest;
use App\Models\Admin\Cate;
use App\Models\Admin\Good;
use DB;
use Illuminate\Http\Request;

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

        // 获取类别信息
        $id        = $request->input('id', '');
        $cate_data = Cate::getDatecate();

        $count      = Good::count(); //获取数据的条数
        $page_count = $request->input('page_count', 5); //显示的条数
        $goods      = new Good(); //创建数据对象

        // 搜索条件
        if (isset($search) && !empty($search)) {
            $goods = $goods::where('gname', 'like', '%' . $search . '%');
        }
        if (isset($id) && !empty($id)) {
            $goods = $goods->where('id', 'like', '%' . $id . '%');
        }
        // 分页
        $data = $goods->paginate($page_count);
        // 显示到模板
        return view('admin/good/index', ['title' => '文章列表', 'data' => $data, 'cate_data' => $cate_data, 'search' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取类别信息
        $cate_data = Cate::getDatecate();
        // 显示到模板
        return view('admin/good/create', ['title' => '文章添加', 'cate_data' => $cate_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodRequest $request)
    {
        $data = $request->except('_token', '_method', 's');
        // dump($data);die;

        //添加到数据库
        $good        = new Good;
        $good->gname = $request->input('gname');
        $good->id    = $request->input('id');

        $good->abs = $request->input('abs');

        $good->gpic = $request->input('gpic');

        $good->content = $request->input('content');

        $res = $good->save();
        //判断
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
        //获得要修改的数据
        $data = good::find($gid);
        //类别信息
        $cate_data = Cate::getDatecate();
        //显示到模板
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
        //获得要修改的数据
        $data = $request->except('_token', '_method', 's');

        //修改数据
        $res = DB::table('blog_goods')->where('gid', $gid)->update($data);

        //做判断
        if ($res) {

            return redirect('/admin/good')->with('success', '修改成功');

        } else {

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
        //删除数据
        $res = $good->delete();
        // 返回结果
        if ($res) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}
