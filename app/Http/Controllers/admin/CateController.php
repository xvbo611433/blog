<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use DB;
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
        $sql       = "select *,concat(path,',','id') as paths from cates order by paths asc";
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

        $cate = Cate::where('pid', $id)->first();
          if ($cate) {
            return back()->with('error', '有子类不能删除');
        }
        

        //
        $goods = Good::where('id','=',$id)->first();
        $data = $goods['id'];
        if($data == $id){
            return back()->with('error', '有文章不能删除');
        }
      

        //删除获得的数据
        $tmp = Cate::destroy($id);
        if ($tmp) {
            return redirect('/admin/cate')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}