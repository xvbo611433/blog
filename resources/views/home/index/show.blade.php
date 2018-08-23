<!doctype html>
<html>
<head>
    <meta charset="gbk">
    <title>{{$title}}</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/css/index.css" rel="stylesheet">
    <link href="/home/comment/css/comment.css" rel="stylesheet">
    <link href="/home/comment/css/style.css" rel="stylesheet">
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.easyfader.min.js"></script>
    <script src="/home/js/scrollReveal.js"></script>
    <script src="/home/js/common.js"></script>
    <script type="text/javascript" src="/home/comment/js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="/home/comment/js/jquery.flexText.js"></script>
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


                        <?php $cate = \App\Models\admin\Cate::getcates();?>


            @foreach($cate as $v)

                <li><a href="/home/list/{{$v->id}}">{{$v->cname}}</a>
                    <ul class="sub-nav">
                        @foreach($v->child_cate as $vv)
                            <li><a href="/home/list/{{$vv->id}}">{{$vv->cname}}</a></li>
                        @endforeach

                    </ul>
                @endforeach
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
  <!--mnav begin-->
  <div id="mnav">
    <h2><a href="http://www.yangqq.com" class="mlogo">微博客</a><span class="navicon"></span></h2>
    <dl class="list_dl">
      <dt class="list_dt"> <a href="index.html">网站首页</a> </dt>
      <dt class="list_dt"> <a href="about.html">关于我</a> </dt>
      <dt class="list_dt"> <a href="#">模板分享</a> </dt>
      <dd class="list_dd">
        <ul>
          <li><a href="share.html">个人博客模板</a></li>
          <li><a href="share.html">国外Html5模板</a></li>
          <li><a href="share.html">企业网站模板</a></li>
        </ul>

      <dt class="list_dt"> <a href="time.html">时间轴</a> </dt>
      <dt class="list_dt"> <a href="gbook.html">留言</a> </dt>
    </dl>
  </div>
  <!--mnav end-->

</header>


<article>
  <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">{{$cate_name}}</a></h1>
  <div class="infosbox">
    <div class="newsview">

      <h3 class="news_title">{{$essay['gname']}}</h3>
      <div class="bloginfo">
        <ul>

          <li class="lmname"><a href="/">{{$essay['goods_cate']['cname']}}</a></li>
          <li class="timer">{{$essay['updated_at']}}</li>

        </ul>
      </div>

      <div class="tags"><a href="/" target="_blank">个人博客</a> &nbsp; <a href="/" target="_blank">小世界</a></div>
      <div class="news_about"><strong>简介</strong>{{$essay['abs']}}</div>
      <div class="news_con">
{!!$essay['content']!!} </div>
    </div>
    <div class="share">
      <p class="diggit"><a href="JavaScript:makeRequest('/e/public/digg/?classid=3&amp;id=19&amp;dotop=1&amp;doajax=1&amp;ajaxarea=diggnum','EchoReturnedText','GET','');"> 很赞哦！ </a>(<b id="diggnum"><script type="text/javascript" src="/e/public/ViewClick/?classid=2&amp;id=20&amp;down=5"></script>13</b>)</p>
      <p class="dasbox"><a href="javascript:void(0)" onclick="dashangToggle()" class="dashang" title="打赏，支持一下">打赏本站</a></p>
      <div class="hide_box"></div>
      <div class="shang_box"> <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭">关闭</a>
        <div class="shang_tit">
          <p>感谢您的支持，我会继续努力的!</p>
        </div>
        <div class="shang_payimg"> <img src="images/alipayimg.jpg" alt="扫码支持" title="扫一扫"> </div>
        <div class="pay_explain">扫码打赏，你说多少就多少</div>
        <div class="shang_payselect">
          <div class="pay_item checked" data-id="alipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="images/alipay.jpg" alt="支付宝"></span> </div>
          <div class="pay_item" data-id="weipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="images/wechat.jpg" alt="微信"></span> </div>
        </div>
        <script type="text/javascript">
    $(function(){
      $(".pay_item").click(function(){
        $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
        var dataid=$(this).attr('data-id');
        $(".shang_payimg img").attr("src","images/"+dataid+"img.jpg");
        $("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
      });
    });
    function dashangToggle(){
      $(".hide_box").fadeToggle();
      $(".shang_box").fadeToggle();
    }
    </script>
      </div>
    </div>
    <div class="nextinfo">
      <p>上一篇：<a href="/news/life/2018-03-13/804.html">作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</a></p>
      <p>下一篇：<a href="/news/life/">返回列表</a></p>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        <li><a href="/download/div/2018-04-22/815.html" title="html5个人博客模板《黑色格调》">html5个人博客模板《黑色格调》</a></li>
        <li><a href="/download/div/2018-04-18/814.html" title="html5个人博客模板主题《清雅》">html5个人博客模板主题《清雅》</a></li>
        <li><a href="/download/div/2018-03-18/807.html" title="html5个人博客模板主题《绅士》">html5个人博客模板主题《绅士》</a></li>
        <li><a href="/download/div/2018-02-22/798.html" title="html5时尚个人博客模板-技术门户型">html5时尚个人博客模板-技术门户型</a></li>
        <li><a href="/download/div/2017-09-08/789.html" title="html5个人博客模板主题《心蓝时间轴》">html5个人博客模板主题《心蓝时间轴》</a></li>
        <li><a href="/download/div/2017-07-16/785.html" title="古典个人博客模板《江南墨卷》">古典个人博客模板《江南墨卷》</a></li>
        <li><a href="/download/div/2017-07-13/783.html" title="古典风格-个人博客模板">古典风格-个人博客模板</a></li>
        <li><a href="/download/div/2015-06-28/748.html" title="个人博客《草根寻梦》—手机版模板">个人博客《草根寻梦》—手机版模板</a></li>
        <li><a href="/download/div/2015-04-10/746.html" title="【活动作品】柠檬绿兔小白个人博客模板">【活动作品】柠檬绿兔小白个人博客模板</a></li>
        <li><a href="/jstt/bj/2015-01-09/740.html" title="【匆匆那些年】总结个人博客经历的这四年…">【匆匆那些年】总结个人博客经历的这四年…</a></li>
      </ul>
    </div>
    <div class="news_pl">
      <h2>文章评论</h2>
        <div class="commentAll">
            <!--评论区域 begin-->
            <div class="reviewArea clearfix">
                <textarea class="content comment-input" readonly="" placeholder="请先登录..."></textarea>
                <a href="/home/comment/{{ $essay['gid'] }}" class="plBtn">评论</a>
            </div>
            @foreach($comment as $k=>$v)
            <div class="comment-show">
                <div class="comment-show-con clearfix">
                    <div class="comment-show-con-img pull-left">
                        <img src="{{ $v['profile'] }}" alt="">
                    </div>
                    <div class="comment-show-con-list pull-left clearfix">
                        <div class="pl-text clearfix">
                            <a href="#" class="comment-size-name">{{ $v['cname'] }} </a>
                            <span class="my-pl-con">&nbsp;{{ $v['comment'] }}</span>
                        </div>
                        <div class="date-dz">
                            <span class="date-dz-left pull-left comment-time">2017-5-2 11:11:39</span>
                            <div class="date-dz-right pull-right comment-pl-block">
                                <a href="/home/comment/destory/{{ $v['id'] }}" onclick="return false" class="removeBlock">删除</a>
                                <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>
                                <span class="pull-left date-dz-line">|</span>
                                <a href="javascript:;" class="date-dz-z pull-left"><i
                                            class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a>
                            </div>
                        </div>
                        <div class="hf-list-con"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--删除评论块-->
        <script type="text/javascript">
            $('.commentAll').on('click', '.removeBlock', function () {
                var comment = $('.comment-show').find('span').first().val();
                var id = $('.comment-pl-block').find('a').first('.removeBlock').attr('href');
                var gid = id.substr(22);
                 var oT = $(this).parents('.date-dz-right').parents('.date-dz').parents('.comment-show-con-list').parents('.comment-show-con').parents('.comment-show');


                $.ajax({
                    url: '/home/comment/destroy/{id}',
                    type:'post',
                    data:{'id':gid},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(msg){
                        // alert(msg);
                        if(msg == 'success'){
                            oT.remove();
                        }
                    },
                    dataType:'html',
                    async:true
                });


            })
        </script>
    </div>
  </div>
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
        <li class="sina"><a href="/" target="_blank"><span>新浪微博</span>微博客</a></li>
        <li class="tencent"><a href="/" target="_blank"><span>腾讯微博</span>微博客</a></li>
        <li class="qq"><a href="/" target="_blank"><span>QQ号</span></a></li>
        <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span></a></li>
        <li class="wxgzh"><a href="/" target="_blank"><span>微信号</span> </a></li>
        <li class="wx"><img src="/home/images/wx.jpg"></li>
      </ul>
    </div>
  </div>
</article>
<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#top" class="cd-top">Top</a>

</body>
</html>
