<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//后台

Route::get('/code','admin\CodeController@code');//验证码
Route::controller('/login','admin\LoginController');//用户登录

Route::group(['middleware'=>'login'],function(){


Route::resource('/admin/user','admin\UserController');//后台用户控制器

Route::resource('/admin/cate','admin\CateController');//后台类别控制器

Route::get('admin/cate/childcate/{id}','admin\CateController@childcate');


Route::resource('/admin/comment','admin\CommentController');//评论管理控制器

Route::controller('/admin/image','admin\imageController');//轮番图管理控制器

Route::resource('/admin/good','admin\GoodController');//文章管理
Route::controller('/admin/index','admin\IndexController');//首页

Route::resource('/admin/link','admin\LinkController');//友情链接管理
Route::controller('/admin/recycle','admin\RecycleController');//回收站管理
Route::resource('/admin/photo','admin\PhotoController');//后台用户控制器

});
//前台
Route::get('/','home\IndexController@index');
Route::get('/home/show/{id}','home\IndexController@show');//详情
Route::get('/home/list/{id}','home\IndexController@list');//列表



Route::get('/home/cmt','home\Cmtcontroller@index');
Route::post('/home/cm','home\Cmtcontroller@store');

Route::get('/home/time','home\TextController@time');//时间轴
Route::get('/home/about','home\TextController@about');//关于我
				