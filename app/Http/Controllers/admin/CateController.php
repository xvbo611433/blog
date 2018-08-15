<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use Illuminate\Http\Request;


class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "select *,concat(path,',','id') as paths from cates order by paths asc";
        $cate_data = Cate::getDatecate();
        // dump($cate_data);die;

        return view('admin/cate/index', ['title' => '类别列表', 'cate_data' => $cate_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取显示分类详情
        $cate_data = Cate::getDatecate();
        return view('admin/cate/create', ['title' => '类别添加', 'cate_data' => $cate_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据

        $data = $request->except('_token', 's');
        // dump($data);die;
        if ($data['pid'] == 0) {
            $data['path'] = $data['pid'];
        } else {
            //拼接id
            $parent_data = Cate::where('id', $data['pid'])->first();
            // dump($parent_data);die;
            //拼接path
            $data['path'] = $parent_data['path'] . ',' . $parent_data['id'];

        }
        $res = Cate::insert($data);

        if ($res) {
            return redirect('/admin/cate')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //检测当前要删除的分类下面是否有子分类
        $cate = new Cate();
        $child_data = $cate->where('pid', $id)->first();
        //检测当前分类下是否有商品
        // $camp = Goods::where('id',$id)->first();
        // if ($camp) {
        //      return $arr = ['status'=>0,'msg'=>'当前分类下有商品,不允许删除'];
        // }
        // // dump($child_data);
        // // die;
        // if (!empty($child_data)) {
        //     // 当前分类下有子分类不允许删除
        //     return $arr = ['status'=>0,'msg'=>'当前分类下有子分类不允许删除'];
        // }
        //执行删除
        $tmp = $cate::find($id);
        $res = $tmp->delete();
        if ($res) {
            return redirect('/admin/cate')->with('success', '删除成功');
        } else {
            return back()->with('error', '添加失败');
        }
    }
}
