<!doctype html>
<html>
<head>
    <meta charset="gbk">
    <title>{{$title}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/base.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/m.css" rel="stylesheet">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.easyfader.min.js"></script>
    <script src="js/scrollReveal.js"></script>
    <script src="js/common.js"></script>
    <script src="js/page.js"></script>
    <!--[if lt IE 9]>
    <script src="js/modernizr.js"></script>
    <![endif]-->
</head>
<body>

 <a name="top"></a>
<header>
    <!--menu begin-->
    <div class="menu">
        <nav class="nav" id="topnav">
            <h1 class="logo"><a href="http://www.blog.com">微博客</a></h1>
            <li><a href="/">网站首页</a></li>


                        <?php $cate = \App\Models\admin\Cate::getCate(0);?>


            @foreach($cate as $v)

                <li><a href="#">{{$v->cname}}</a>
                    <ul class="sub-nav">
                        @foreach($v->child_cate as $vv)
                            <li><a href="/home/list/{{$vv->id}}">{{$vv->cname}}</a></li>
                        @endforeach

                    </ul>
                @endforeach
                            <li><a href="/home/picture">相册</a></li> 
                            <li><a href="/home/time">时间轴</a></li>
                            <li><a href="/home/about">关于我</a></li>  

                <!--search begin-->
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
                    <!--search end-->
        </nav>
    </div>


</header>
<div class="pagebg timer"> </div>
<div class="container">
  <h1 class="t_nav"><span>时光飞逝，机会就在我们眼前，何时找到了灵感，就要把握机遇，我们需要智慧和勇气去把握机会。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">时间轴</a></h1>
  <div class="timebox">
  <ul id="list" style="display:none;">
  @foreach ($time as $v)


    <li><span>{{$v['updated_at']}}</span><a href="/home/show/{{ $v['gid'] }}" title="帝国cms 首页或者列表页 实现图文不同样式调用方法">{{$v['gname']}}</a></li>
@endforeach
  </ul>
  <ul id="list2">
  </ul>
  <script src="js/page2.js"></script>
  </div>
</div>
<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#top" class="cd-top">Top</a>

</body>
</html>
