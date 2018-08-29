<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/css/index.css" rel="stylesheet">
    <link href="/layui/layui/css/layui.css" rel="stylesheet">
    <script src="/layui/layui/layui.js"></script>
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.easyfader.min.js"></script>
    <script src="/home/js/scrollReveal.js"></script>
    <script src="/home/js/common.js"></script>
    <link rel="stylesheet" href="/home/bootstrap.min.css">
    <link rel="stylesheet" href="/home/bs/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/home/bs/css/bootstrap.css">
    <script type="text/javascript" src="/home/bs/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/home/bs/js/bootstrap.js"></script>

    <style type="text/css">
        .user_info_content{width: 100%;float: left;}
        .user_info{width: 25%;font-size: 20px;margin-top: 20px;text-align: center;line-height: 42px;border:1px solid #0f9e92;}
        .user_info ul li:hover{background-color: orange;}
        .edit_info{float: right;padding-bottom: 100px;margin: 20px 20px;width: 68%;border:1px solid #0f9e92;clear: both;}
        .hr1{ height:1px;border:none;border-top:1px solid #000;}
        .glyphicon{text-align: center;line-height: 24px;height: 24px;}
        label{font-weight: bold;}
    </style>

</head>
<script>
    //一般直接写在一个js文件中
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;


    });
</script>
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
        <div class="user_info_content">
            <div class="container edit_info">
                <h3><span class="glyphicon glyphicon-edit" aria-hidden="true"> 修改密码</span></h3>
                <hr class="hr1">
                <form  action="/home/editPwd" method="post" style="width: 77%;">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">旧密码</label>
                        <input type="text" name="pwd" value="{{ old('pwd') }}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">新密码</label>
                        <input type="password" name="upwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">确认密码</label>
                        <input type="password" name="repwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <button type="submit" class="layui-btn layui-btn-lg layui-btn-warm layui-btn-radius ">提交</button>
                </form>
            </div>
            <div class="user_info">
                <ul class="list-group">
                    <li class="layui-icon layui-icon-set-sm"><a href="/home/userinfo">个人信息</a></li>
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