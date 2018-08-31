<!doctype html>
<html>
<head>
    <meta charset="gbk">
    <title>{{$title}}</title>

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

<header>
    <!--menu begin-->
    <div class="menu">
        <nav class="nav">
            <h1 class="logo"><a href="http://www.blog.com">微博客</a></h1>
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
                <li><a href="/home/picture">相册</a></li>
                <li><a href="/home/time">时间轴</a></li>
                <li><a href="/home/about">关于我</a></li>
          
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
<article>
    <!--banner begin-->
    <div class="picsbox">
        <div class="banner">
            <div id="banner" class="fader">
                @foreach($data as $v)
                    <li class="slide"><a href="/home/show/{{ $v['gid'] }}" target="_blank">{!! $v['gpic'] !!}<span
                                    class="imginfo">{{ $v['abs'] }}</span></a></li>
                @endforeach
                <div class="fader_controls">
                    <div class="page prev" data-target="prev">&lsaquo;</div>
                    <div class="page next" data-target="next">&rsaquo;</div>
                    <ul class="pager_list">
                    </ul>
                </div>
            </div>
        </div>
        <!--banner end-->
        <div class="toppic">
            <li><a href="/" target="_blank"> <i><img src="/home/images/toppic01.jpg"></i>
                    <h2>别让这些闹心的套路，毁了你的网页设计!</h2>
                    <span>学无止境</span> </a></li>
            <li><a href="/" target="_blank"> <i><img src="/home/images/zd01.jpg"></i>
                    <h2>个人博客，属于我的小世界！</h2>
                    <span>学无止境</span> </a></li>
        </div>
    </div>
    <div class="blank"></div>
    <!--blogsbox begin-->
    <div class="blogsbox">
        @foreach($good as $v)
            <div class="blogs" data-scroll-reveal="enter bottom over 1s">

                <h3 class="blogtitle"><a href="/home/show/{{ $v['gid'] }}" target="_blank">{{$v['gname']}}</a></h3>
                <span class="blogpic"><a href="/" title="">{!!$v['gpic']!!}</a></span>
                <p class="blogtext">{{$v['abs']}} </p>
                <div class="bloginfo">
                    <ul>

                        <li class="lmname"><a href="/">{{$v['goods_cate']['cname']}}</a></li>
                        <li class="timer">{{$v['updated_at']}}</li>


                    </ul>
                </div>

            </div>
        @endforeach

        <style type="text/css">
            #pull_right {text-align: center;}
            .pagination {display: inline-block;padding-left: 0;margin: 20px 0;border-radius: 4px;}
            .pagination > li {display: inline;}
            .pagination > li > a,
            .pagination > li > span {position: relative;float: left;padding: 6px 12px;margin-left: -1px;line-height: 1.42857143;color: #428bca;text-decoration: none;background-color: #fff;border: 1px solid #ddd;}
            .pagination > li:first-child > a,
            .pagination > li:first-child > span {margin-left: 0;border-top-left-radius: 4px;border-bottom-left-radius: 4px;}
            .pagination > li:last-child > a,
            .pagination > li:last-child > span {border-top-right-radius: 4px;border-bottom-right-radius: 4px;}
            .pagination > li > a:hover,
            .pagination > li > span:hover,
            .pagination > li > a:focus,
            .pagination > li > span:focus {color: #2a6496;background-color: #eee;border-color: #ddd;}
            .pagination > .active > a,
            .pagination > .active > span,
            .pagination > .active > a:hover,
            .pagination > .active > span:hover,
            .pagination > .active > a:focus,
            .pagination > .active > span:focus {z-index: 2;color: #fff;cursor: default;background-color: #428bca;border-color: #428bca;}
            .pagination > .disabled > span,
            .pagination > .disabled > span:hover,
            .pagination > .disabled > span:focus,
            .pagination > .disabled > a,
            .pagination > .disabled > a:hover,
            .pagination > .disabled > a:focus {color: #777;cursor: not-allowed;background-color: #fff;border-color: #ddd;}
            .clear {clear: both;}
        </style>


        <div id="pull_right">
            <div class="pull-right">
                {!! $good->render() !!}
            </div>
        </div>

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
                <a href="/">陌上花开</a> <a href="/">校园生活</a> <a href="/">html5</a> <a href="/">SumSung</a> <a
                        href="/">青春</a> <a href="/">温暖</a> <a href="/">阳光</a> <a href="/">三星</a><a href="/">索尼</a> <a
                        href="/">华维荣耀</a> <a href="/">三星</a> <a href="/">索尼</a>
            </ul>
        </div>
        <div class="links">
            <h2 class="hometitle">友情链接</h2>
            <ul>
                @foreach($link as $v)

                    <li style="width: 54px;height: 54px;"><a href="http://{{ $v['LinkAddress'] }}" target="_blank">{!! $v['LinkInfo'] !!}</a>
                    </li>
                @endforeach
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

</article>
<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>


</body>
</html>
