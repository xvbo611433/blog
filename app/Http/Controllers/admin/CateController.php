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
        //获取显示分类详情
        $cate_data = Cate::getDatecate();
        // dump($cate_data);die;
        //显示到模板
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
        //显示到模板
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
        //添加到数据库
        $res = Cate::insert($data);
        //处理结果
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
        
        // 检测当前分类下是否有文章
      
        $goods = Good::where('id','=',$id)->first();
        $data = $goods['id'];
        if($data == $id){
            return back()->with('error', '有文章不能删除');
        }
      

        //处理数据
        $tmp = Cate::destroy($id);
        if ($tmp) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
        /**
     * 执行添加子分类
     * @return \Illuminate\Http\Response
     */
    public function childcate($id)
    {   
        //获取要添加的父类
        $cate = new Cate();
        $data = $cate::find($id);
        // 获取显示分类详情
        $cate_data = Cate::getDatecate();
        // dump($data->id);
        // dump($cate_data);
        //显示到模板
        return view('admin/cate/childcate',['cate_data'=>$cate_data,'data'=>$data,'title'=>'添加子分类']);
      
    }
}
