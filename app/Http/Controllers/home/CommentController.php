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
        $arr = session('comment');
        $Register = Register::find($arr['id']);
        $lg_user = $Register->info;
        // 回复信息
        $reply = Reply::all();
        // 获取文章详情
        $comment = Comment::where('status', 1)->orderBy('created_at','desc')->get();

        return view('home.comment.index',['cate'=>$cate,'user'=>$user,'essay'=>$essay,'title'=>'评论详情页','comment'=>$comment,'lg_user'=> $lg_user,'Register'=>$Register,'arr'=>$arr,'reply'=>$reply]);

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
        $comment->uid = $request->input('uid');

        // 写入数据库
        $res = $comment->save();
        $id = $comment->id;
        session(['comment_id'=>$id]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {
        $data = $request->except('s','_token');

        $id = $request->input('id');
//        dd($id);
        $res = DB::table('blog_comment')->where('id',$id)->update($data);
        if($res){
            $arr = ['like'=>$data];
        }else{
            $arr = ['like'=>'error'];
        }
        return $arr;
    }

    //屏蔽 启用
    public function getShow($id,$status=0)
    {
        $data['status'] =$status;
        DB::table('blog_goods')->where('gid', $id)->update($data);
        return redirect('/admin/image/create');

    }

    public function getHidden($id,$status=1)
    {

        $data['status'] =$status;
        DB::table('blog_goods')->where('gid', $id)->update($data);
        return redirect('/admin/image/create');
    }
}
