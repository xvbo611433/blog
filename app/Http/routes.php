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
//前台

Route::get('/code','admin\CodeController@code');
Route::controller('/login','admin\LoginController');//用户登录

Route::group(['middleware'=>'login'],function(){
Route::get('admin/index','admin\IndexController@index');
Route::resource('/admin/user','admin\UserController');//后台用户控制器

Route::resource('/admin/cate','admin\CateController');//后台类别控制器

Route::resource('/admin/comment','admin\CommentController');//评论管理控制器

Route::resource('/admin/image','admin\imageController');//轮番图管理控制器

Route::resource('/admin/good','admin\GoodController');//文章管理

Route::resource('/admin/link','admin\LinkController');//友情链接管理
Route::controller('/admin/recycle','admin\RecycleController');//回收站管理

});
