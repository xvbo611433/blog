<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/css/index.css" rel="stylesheet">
    <link href="/layui/css/layui.css" rel="stylesheet">
    <script src="/layui/layui.js"></script>
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/scrollReveal.js"></script>
    <link rel="stylesheet" href="/home/bootstrap.min.css">
    <link rel="stylesheet" href="/home/bs/css/bootstrap.css">
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/home/bs/js/bootstrap.js"></script>

    <style type="text/css">
        .user_info_content{width: 100%;float: left;}
        .user_info{width: 25%;font-size: 20px;margin-top: 20px;text-align: center;line-height: 42px;border:1px solid #0f9e92;}
        .user_info ul li:hover{background-color: orange;}
        .edit_info{float: right;padding-bottom: 100px;margin: 20px 20px;width: 68%;border:1px solid #0f9e92;clear: both;}
        .hr1{ height:1px;border:none;border-top:1px solid #000;}
        .glyphicon{text-align: center;line-height: 24px;height: 24px;}
        label{font-weight: bold;}
        /*.btn-file {position: relative;display: inline-block;width: 100px;height: 100px;border-radius: 50%;text-align: center;line-height: 100px;overflow: hidden;}*/
        /*.btn-file input {position: absolute;top: 0;left: 0;width: 100px;height: 100px;opacity: 0;filter: alpha(opacity: 0);cursor: pointer;}*/
        .img-file{position: absolute;width: 100px;height: 100px;border-radius: 50%;}
    </style>
    <script>
        //一般直接写在一个js文件中
        layui.use(['layer', 'form'], function(){
            var layer = layui.layer
                ,form = layui.form;
        });
    </script>
</head>
<body>
<header>
    <!--menu begin-->
    <div class="menu">

        <nav class="nav" id="topnav">
            <h1 class="logo"><a href="http://www.yangqq.com">微博客</a></h1>
            <li><a href="/">网站首页</a></li>
            <?php $cate = \App\Models\admin\Cate::getCate(0);?>
            @foreach($cate as $v)
                <li><a href="/home/list/{{$v->id}}">{{$v->cname}}</a>
                    <ul class="sub-nav">
                        @foreach($v->child_cate as $vv)
                            <li><a href="/home/list/{{$vv->id}}">{{$vv->cname}}</a></li>
                        @endforeach
                    </ul>
            @endforeach
                <!--search begin-->
                <li><a href="/home/time">时间轴</a></li>
                <li>
                    <div id="search_bar" class="search_bar">
                        <form id="searchform" action="[!--news.url--]e/search/index.php" method="post"
                              name="searchform">
                            <input class="input" placeholder="想搜点什么呢..." type="text" name="keyboard" id="keyboard">
                            <input type="hidden" name="show" value="title"/>
                            <input type="hidden" name="tempid" value="1"/>
                            <input type="hidden" name="tbname" value="news">
                            <input type="hidden" name="Submit" value="搜索"/>
                            <span class="search_ico"></span>
                        </form>
                    </div>
                </li>

                <!--search end-->
        </nav>
    </div>

</header>
<article>
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="user_info_content">
        <div class="container edit_info">
            <h3><span class="glyphicon glyphicon-cog" aria-hidden="true"> 完善个人信息</span></h3>
            <hr class="hr1">
            <div class="form-group father-file">
                <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
                <img src="/home/images/aa.jpg" class="img-file" id="img-file">
                <button type="button" class="layui-btn" id="img-file" style="display: none">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <script>

                    layui.use('upload', function(){
                        var upload = layui.upload;

                        //执行实例
                        var uploadInst = upload.render({
                            elem: '#img-file' //绑定元素
                            ,url: '/home/showInfo' //上传接口
                            ,data: {'_token':$(".tag_token").val()}
                            ,field:'profile'
                            ,done: function(res){
                                // 修改当前头像
                                $("img").first('.img-file').attr('src',res.tep);
                            }

                        });
                    });
                </script>

            </div>
            <form action="/home/store/info" method="post" class="form-horizontal" style="width:77%;margin-left: 150px;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="hidden" name="uid" value="{{ $data['id'] }}" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword7" class="col-sm-2 control-label">用户昵称：</label>
                    <div class="col-sm-10">
                        <input type="text" name="nickname" value="{{ old('nickname') }}" class="form-control" id="inputPassword7" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword8" class="col-sm-2 control-label">QQ号：</label>
                    <div class="col-sm-10">
                        <input type="text" name="qq" value="{{ old('qq') }}" class="form-control" id="inputPassword8" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword9" class="col-sm-2 control-label">性别：</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sex" id="inputPassword9">
                            <option selected value="m">男</option>
                            <option value="w">女</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-sm-2 control-label">手机号：</label>
                    <div class="col-sm-10">
                        <input type="text" name="tel" value="{{ old('tel') }}" class="form-control" id="inputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2 control-label">真实姓名：</label>
                    <div class="col-sm-10">
                        <input type="text" name="rname" value="{{ old('rname') }}" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-2 control-label">城市：</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword5" class="col-sm-2 control-label">微信号：</label>
                    <div class="col-sm-10">
                        <input type="text" name="wname" value="{{ old('wname') }}" class="form-control" id="inputPassword5" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword6" class="col-sm-2 control-label">微博账号：</label>
                    <div class="col-sm-10">
                        <input type="text" name="baddress" value="{{ old('baddress') }}" class="form-control" id="inputPassword6" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="layui-btn layui-btn-lg layui-btn-warm layui-btn-radius ">保存</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="user_info">
            <ul>
                <li class="layui-icon layui-icon-set-sm"><a href="/home/create/{{ session('id') }}">个人信息</a></li>
                <li class="layui-icon layui-icon-password"><a href="/home/edit">修改密码</a></li>

            </ul>
        </div>
    </div>


</div>
</article>
<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
</body>
</html>