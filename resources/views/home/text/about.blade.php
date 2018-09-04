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
    <style>
      
  .about p img{
        margin: 5% 35%;
        width: 100px;
        height: 100px;
        border-radius: 50%;
      }


    </style>
</head>
<body>

 <a name="top"></a>
<header>
    <!--menu begin-->
    <div class="menu">
        <nav class="nav" id="topnav">
            <h1 class="logo"><a href="http://www.yangqq.com">微博客</a></h1>
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

<div class="pagebg ab"> </div>
<div class="container">
  <h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">关于我</a></h1>
  <div class="news_infos">
    <ul>
      <p>{!!$about['content']!!}</p>
      <br />
      <h2>About my blog</h2>
      &nbsp;
      <p>域 名：{{$_SERVER['SERVER_NAME']}}<?php echo date('Y年m月d日 H时i分s秒')?>&nbsp;</p>
      <br />
      <p>服务器：阿里云服务器&nbsp;&nbsp;<a href="https://promotion.aliyun.com/ntms/act/ambassador/sharetouser.html?userCode=8smrzoqa&amp;productCode=vm" target="_blank"><span style="color:#FF0000;"><strong>前往阿里云官网购买&gt;&gt;</strong></span></a></p>
      <br />
      <p>备案号：蜀ICP备11002373号-1</p>
      <br />
      <p>程 序：PHP 帝国CMS7.5</p>
    </ul>
  </div>
  <div class="sidebar">
    <div class="about">
       {!!$about['tou']!!} 
      <p class="abname">{{$about['name']}}</p>
      <p class="abposition">{{$about['message']}}</p>
      <p class="abtext"> {{$about['resume']}}</p>
    </div>
    <div class="weixin">
      <h2 class="hometitle">微信关注</h2>
      <ul >
        <img src="/home/images/mmqrcode1535504449800.png" }>
      </ul>
    </div>
  </div>
</div>
<footer>
  <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
