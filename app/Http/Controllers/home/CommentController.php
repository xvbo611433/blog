<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Cate;
use App\Models\admin\Good;
use App\Models\admin\Comment;
use DB;
use  App\Models\home\Reply;
use App\Models\home\Register;
use App\Models\home\UserInfo;

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
        //获取用户登陆信息
        $lg_user = session('comment');

        //获取注册用户的信息
        $data = session('info');
        $lg_name = UserInfo::find($data['id']);
        // 获取文章详情
        $comment = Comment::orderBy('created_at','desc')->get();
<<<<<<< Updated upstream
        return view('home.comment.index',['cate'=>$cate,'user'=>$user,'essay'=>$essay,'title'=>'评论详情页','comment'=>$comment]);
=======
        return view('home.comment.index',['cate'=>$cate,'user'=>$user,'essay'=>$essay,'title'=>'评论详情页','comment'=>$comment,'li_user'=>$lg_user,'lg_name'=>$lg_name]);
>>>>>>> Stashed changes
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
        // 评论
        $comment = new Comment;
        // 接收ajax数据
        $comment->gid = $request->input('gid');
        $comment->uname = $request->input('user');
        $comment->profile = $request->input('profile');
        $comment->comment = $request->input('content');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        // 回复
        $reply = new Reply;
        $reply->reply_user = $request->input('user');
        $reply->reply_object = $request->input('name');
        $reply->reply_content = $request->input('content');
        $reply->reply_profile = $request->input('profile');
        $reply->reply_id = $request->input('id');

        // 写入数据库
        $res = $reply->save();
        if($res){
            $arr = ['comment'=>$reply];
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
