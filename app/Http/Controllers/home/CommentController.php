<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use App\Models\admin\Comment;
use DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        // 用户的信息
        $user = $request->all();
        // 类别信息
        $essay = Good::find($id);
        $cate = Cate::getCate();
        // 获取文章详情
        $comment = Comment::orderBy('time','desc')->get();
        return view('home.comment.index',['cate'=>$cate,'user'=>$user,'essay'=>$essay,'title'=>'评论详情页','comment'=>$comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {

        $comment = new Comment;
        // 接收ajax数据
        $comment->gid = $request->input('gid');
        $comment->uname = $request->input('user');
        $comment->profile = $request->input('profile');
        $comment->comment = $request->input('content');
        $comment->time = $request->input('time');
        // 写入数据库
        $res = $comment->save();
        if($res){
            $arr = ['comment'=>$comment];
        }else{
            $arr = ['comment'=>'error'];
        }
        return $arr;
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // 接收要删除的id
        $id = $request->input('id');
        // 删除并返回结果
        $res = Comment::destroy($id);
        if($res) {
            echo 'success';
            } else {
            echo 'error';
            }
        }
}
