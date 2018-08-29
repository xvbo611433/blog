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
        $link = Link::get();
        $phototype =Phototype::get();
        return view('home/picture/index', ['title' => '相册','link'=>$link,'phototype'=>$phototype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photo($photo_id)
    {
        // echo $photo_id;
        $link = Link::get();
        $photo =Photo::where('photo_id', $photo_id)->get();
        // dd($phototype);
        return view('home/picture/show',['title' => '图片','link'=>$link,'photo'=>$photo]);
    }

}