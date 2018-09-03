<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Models\admin\Link;
use DB;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $search = $request->input('search', ''); //接受名称

        $count  = Link::count();
        // dd($count);
        $page_count = $request->input('page_count', 5); //分页

        //搜索
        $link = Link::where('LinkName', 'like', '%' . $search . '%');
        //排序
        $data = $link->orderBy('id', 'asc')->paginate($page_count);
        return view('admin/link/index', ['title' => '友情链接列表', 'data' => $data, 'search' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //渲染到模板
        return view('admin/link/create', ['title' => '友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $data = $request->except('_token', 's'); //获取请求
        // dd($data);
        //添加到数据库
        $res = Link::insert($data);
        //判断添加成功
        if ($res) {
            return redirect('admin/link')->with('success', '添加成功');
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
    public function edit($id)
    {
        $data = Link::find($id); //获取要修改的数据
        //渲染到模板
        return view('admin/link/edit', ['title' => '友情链接修改', 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, $id)
    {
        //获取请求
        $data = $request->except('_token', '_method', 's');
        //修改数据
        $res = DB::table('blog_links')->where('id', $id)->update($data);
        //做判断
        if ($res) {
            return redirect('/admin/link')->with('success', '修改成功');
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
    public function destroy($id)
    {
        //获取删除的数据
        $user = Link::find($id);
        $res  = $user->delete();
        // 返回结果
        if ($res) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}
