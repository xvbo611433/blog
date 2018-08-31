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
                <form class="layui-form" action="" style="float: left;margin:50px 200px;">
                    <div class="layui-form-item">
                        <label class="layui-form-label">昵称：</label>
                        <div class="layui-input-block">
                            <input type="text" name="nickname" required value="{{ $data['nickname'] }}" lay-verify="required" placeholder="昵称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">QQ：</label>
                        <div class="layui-input-block">
                            <input type="text" name="qq" required value="{{ $data['qq'] }}" lay-verify="required" placeholder="QQ号" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">电话：</label>
                        <div class="layui-input-block">
                            <input type="text" name="tel" required value="{{ $data['tel'] }}" lay-verify="required" placeholder="电话" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">性别：</label>
                        <div class="layui-input-block">
                            <input type="text" name="sex" required value="{{ $data['sex'] }}" lay-verify="required" placeholder="性别" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">姓名：</label>
                        <div class="layui-input-block">
                            <input type="text" name="rname" required value="{{ $data['rname'] }}" lay-verify="required" placeholder="真实姓名" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">微信：</label>
                        <div class="layui-input-block">
                            <input type="text" name="city" required value="{{ $data['city'] }}" lay-verify="required" placeholder="微信号" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">微博：</label>
                        <div class="layui-input-block">
                            <input type="text" name="wname" required value="{{ $data['wname'] }}" lay-verify="required" placeholder="微博号" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                </form>
            </div>

            <div class="user_info">
                <ul>
                    <li class="layui-icon layui-icon-set-sm"><a href="/home/create/{{ session('id') }}">个人信息</a></li>
                    <li class="layui-icon layui-icon-password"><a href="/home/edit">修改密码</a></li>
                    <li class="layui-icon layui-icon-picture"><a href="/home/profile">修改头像</a></li>
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