<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Link;
use Illuminate\Http\Request;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $search = $request->input('search', ''); //接受商品名称
        $id = $request->input('id', ''); //接收商品类
        $count = Link::count();
        // dd($count);
        $page_count = $request->input('page_count', 5);
        $link = new Link(); //创建数据对象
        if (isset($search) && !empty($search)) {
            $link = $link->where('LinkName', 'like', '%' . $search . '%');
        }

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
        return view('admin/link/create', ['title' => '友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 's');//获取请求
        // dd($data);
        if ($request->hasFile('LinkInfo') == true) {
            $pic = $request->file('LinkInfo');
            $temp_name = time() + rand(10000, 99999);
            $hz = $pic->getClientOriginalExtension();//后缀名
            $file = $temp_name . '.' . $hz;
            $dir = 'link/' . date('Ymd', time());
            $filename = ltrim($dir . '/' . $file, '.');
            $j = $pic->move($dir, $filename); //执行上传图片

            $data['LinkInfo'] = '/link/' . date('Ymd', time()) . '/' . $temp_name . '.' . $hz;//存入数据库
        }

        $res = Link::insert($data);
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
        $data = Link::find($id);//获取要修改的数据
        return view('admin/link/edit', ['title' => '友情链接修改', 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method', 's');
        if ($request->hasFile('LinkInfo') == true) {
            $pic = $request->file('LinkInfo');
            $temp_name = time() + rand(10000, 99999);
            $hz = $pic->getClientOriginalExtension();
            $file = $temp_name . '.' . $hz;
            $dir = 'link/' . date('Ymd', time());
            $filename = ltrim($dir . '/' . $file, '.');
            $pic->move($dir, $filename); //执行上传

            $data['LinkInfo'] = '/link/' . date('Ymd', time()) . '/' . $temp_name . '.' . $hz;

            $res = DB::table('blog_links')->where('id', $id)->update($data);
            //做判断
            if ($res) {

                return redirect('/admin/link')->with('success', '修改成功');

            } else {

                return back()->with('error', '修改失败');

            }
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
        $res = $user->delete();
        // 返回结果
        if ($res) {
            return redirect('admin/link')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}
