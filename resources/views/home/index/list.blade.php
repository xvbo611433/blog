<!doctype html>
<html>
<head>
    <meta charset="gbk">
    <title>{{$cname}}</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/css/index.css" rel="stylesheet">
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.easyfader.min.js"></script>
    <script src="/home/js/scrollReveal.js"></script>
    <script src="/home/js/common.js"></script>
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


                        <?php $cate = \App\Models\admin\Cate::getCate();?>


            @foreach($cate as $v)

                <li><a href="/home/list/{{$v->id}}">{{$v->cname}}</a>
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
<div class="pagebg sh"></div>
<div class="container">

  <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">{{$cname}}</a></h1>

  <!--blogsbox begin-->
  <div class="blogsbox">
  @foreach($good as $v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >

                    <h3 class="blogtitle"><a href="/home/show/{{ $v['gid'] }}" target="_blank">{{$v['gname']}}</a></h3>
                    <span class="blogpic"><a href="/" title="">{!!$v['gpic']!!}</a></span>
                    <p class="blogtext">{{$v['abs']}} </p>
      <div class="bloginfo">
                        <ul>
<!--                             <li class="author"><a href="/">杨青</a></li> -->
                            <li class="lmname"><a href="/">{{$v['goods_cate']['cname']}}</a></li>
                            <li class="timer">{{$v['updated_at']}}</li>
<!--                             <li class="view"><span>34567</span>已阅读</li>
                            <li class="like">9999</li> -->
                        </ul>

      </div>

    </div>

     @endforeach
{!! $good->render() !!}
  </div>
  <!--blogsbox end-->
  <div class="sidebar">

            <div class="tuijian">
                <h2 class="hometitle">推荐文章</h2>
                <ul class="tjpic">
                 @foreach($good as $v)
                    <i>{!!$v['gpic']!!}</i>
                    <p><a href="/home/show/{{ $v['gid'] }}">{{$v['abs']}}</a></p>

                    @endforeach
                </ul>

            </div>

    <div class="cloud">
      <h2 class="hometitle">标签云</h2>
      <ul>
        <a href="/">陌上花开</a> <a href="/">校园生活</a> <a href="/">html5</a> <a href="/">SumSung</a> <a href="/">青春</a> <a href="/">温暖</a> <a href="/">阳光</a> <a href="/">三星</a><a href="/">索尼</a> <a href="/">华维荣耀</a> <a href="/">三星</a> <a href="/">索尼</a>
      </ul>
    </div>

        <div class="guanzhu" id="follow-us">
            <h2 class="hometitle">关注我们 么么哒！</h2>
            <ul>
                <li class="sina"><a href="/" target="_blank"><span>新浪微博</span></a></li>
                <li class="tencent"><a href="/" target="_blank"><span>腾讯微博</span></a></li>
                <li class="qq"><a href="/" target="_blank"><span>QQ号</span></a></li>
                <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span></a></li>
                <li class="wxgzh"><a href="/" target="_blank"><span>微信号</span></a></li>
                <li class="wx"><img src="/home/images/mmqrcode1535504449800.png"></li>
            </ul>
        </div>
  </div>
</div>



<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#top" class="cd-top">Top</a>

</body>
</html>
