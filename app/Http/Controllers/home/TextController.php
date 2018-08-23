<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin\Good;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function time()
    {
        $time=Good::orderBy('created_at', 'desc')->get();
       return view('home/text/time',['title'=>'时间轴','time'=>$time]);
    }


}
