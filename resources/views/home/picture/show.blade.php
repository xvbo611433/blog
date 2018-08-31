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
    <link href="/home/photo/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />
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
            <h1 class="logo"><a href="http://www.yangqq.com">微博客</a></h1>
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

  <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">相册</a></h1>

  <!--blogsbox begin-->
<div >
 <style type="text/css">
 .example img { height: 250px; width: 350px;  }
 .example p{ height: 250px; width: 350px;  }
 ul li { width: 350px; padding:5px; float: left; overflow: hidden; position: relative; margin-bottom: 30px; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -ms-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease; }
</style>
<ul style="padding:30px">
  @foreach($photo as $v)
  <?php
  $html=$v['photo'];

 if (preg_match('|<img\s+src="?(\S+)?"|i', $html, $reg)) $photo_big=$reg[1];

  ?>
    <li>  <a class="example" href="{{$photo_big}}">{!!$v['photo']!!}</a></li>
     @endforeach
</ul>
</div>
  <!--blogsbox end-->


</div>


<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#top" class="cd-top">Top</a>

</body>
</html>
<script src="/home/photo/js/jquery.min.js"></script>
<script src="/home/photo/js/jquery.imgbox.pack.js"></script>
<script type="text/javascript">
$(function(){

    $(".example").imgbox({
        'speedIn'       : 0,
        'speedOut'      : 0,
        'alignment'     : 'center',
        'overlayShow'   : true,
        'allowMultiple' : false
    });
});
</script>
