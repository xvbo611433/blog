<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\admin\Link;
use App\Models\admin\Cate;
use App\models\admin\Photo;
use App\models\admin\Phototype;


class PictureCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取相册信息
        $phototype =Phototype::get();
        //渲染到模板
        return view('home/picture/index', ['title' => '相册','link'=>$link,'phototype'=>$phototype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photo($photo_id)
    {

        //获取相册中的图片信息
        $photo =Photo::where('photo_id', $photo_id)->get();
        // 渲染到模板
        return view('home/picture/show',['title' => '图片','link'=>$link,'photo'=>$photo]);
    }

}
