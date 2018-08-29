<!doctype html>
<html>
<head>
    <meta charset="gbk">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/comment/css/comment.css" rel="stylesheet">
    <link href="/home/comment/css/style.css" rel="stylesheet">
    <link href="/home/css/index.css" rel="stylesheet">
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.easyfader.min.js"></script>
    <script src="/home/js/scrollReveal.js"></script>
    <script src="/home/js/common.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if lt IE 9]>
    <script src="/home/js/modernizr.js"></script>
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
        <h1 class="t_nav"><span>您现在的位置是：评论页 &gt; 慢生活 &gt;</span><a href="/" class="n1">评论页</a><a href="/" class="n2">慢生活</a></h1>
        <div class="infosbox">
            <div class="news_pl">
                <h2>文章评论</h2>
                <div class="commentAll">
                    <!--评论区域 begin-->
                    <div class="reviewArea clearfix">
                        <textarea class="content comment-input" placeholder="Please enter a comment&hellip;" onkeyup="keyUP(this)"></textarea>
                        <a href="javascript:;" class="plBtn">评论</a>
                    </div>
                    @foreach($comment as $k=>$v)
                                <div class="comment-show">
                                    <div class="comment-show-con clearfix">
                                        <div class="comment-show-con-img pull-left">
                                            @if( !empty($v['profile']) )
                                                <img src="{{ $v['profile'] }}" alt="">
                                            @else
                                                <img src="/home/comment/images/header-img-comment_03.png" alt="">
                                            @endif
                                        </div>
                                        <div class="comment-show-con-list pull-left clearfix">
                                            <div class="pl-text clearfix">
                                                <a href="#" class="comment-size-name">{{ $v['uname'] }} </a>
                                                <span class="my-pl-con">&nbsp;{{ $v['comment'] }}</span>
                                            </div>
                                            <div class="date-dz">
                                                <span class="date-dz-left pull-left comment-time">2017-5-2 11:11:39</span>
                                                <div class="date-dz-right pull-right comment-pl-block">
                                                    <a href="/home/comment/destory/{{ $v['id'] }}" onclick="return false"
                                                       class="removeBlock">删除</a>
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
                    </div>
                </div>

                <script type="text/javascript" src="/home/comment/js/jquery-1.12.0.min.js"></script>
                <script type="text/javascript" src="/home/comment/js/jquery.flexText.js"></script>
                <!--textarea高度自适应-->
                <script type="text/javascript">
                    $(function () {
                        $('.content').flexText();
                    });
                </script>
                <!--textarea限制字数-->
                <script type="text/javascript">
                    function keyUP(t) {
                        var len = $(t).val().length;
                        if (len > 139) {
                            $(t).val($(t).val().substring(0, 140));
                        }
                    }
                </script>
                <!--点击评论创建评论条-->
                <script type="text/javascript">

                    $('.commentAll').on('click', '.plBtn', function () {
                        var myDate = new Date();
                        //获取当前年
                        var year = myDate.getFullYear();
                        //获取当前月
                        var month = myDate.getMonth() + 1;
                        //获取当前日
                        var date = myDate.getDate();
                        var h = myDate.getHours();       //获取当前小时数(0-23)
                        var m = myDate.getMinutes();     //获取当前分钟数(0-59)
                        if (m < 10) m = '0' + m;
                        var s = myDate.getSeconds();
                        if (s < 10) s = '0' + s;
                        var now = year + '-' + month + "-" + date + " " + h + ':' + m + ":" + s;
                        // 文章id
                        var gid = '{{ $essay['gid'] }}';
                        // 用户头像
                        var user = '{{ session('login') }}';

                        var profile = $('.comment-show-con-img').find('img').first().attr('src');

                        //获取输入内容
                        var oSize = $(this).siblings('.flex-text-wrap').find('.comment-input').val();
                          //动态创建评论模块
                         $.ajax({
                            url: '/home/comment/store',
                            type:'post',
                            data:{'gid':gid,'profile':profile,'user':user,'time':now,'content':oSize},
                         headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){
                                var oHtml = '';
                                $.each(data, function (n, value) {
                                    oHtml += '<div class="comment-show"><div class="comment-show-con clearfix"><div class="comment-show-con-img pull-left"><img src="' + value.profile + '" alt=""></div><div class="comment-show-con-list pull-left clearfix"><div class="pl-text clearfix"><a href="#" class="comment-size-name">'+value.uname+': </a><span class="my-pl-con">&nbsp;' + value.comment + '</span></div><div class="date-dz"><span class="date-dz-left pull-left comment-time">' + value.time + '</span><div class="date-dz-right pull-right comment-pl-block"><a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a><span class="pull-left date-dz-line">|</span><a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a></div></div><div class="hf-list-con"></div></div></div></div>';

                                });
                                $('.comment-show').first().prepend(oHtml);
                                $('.flex-text-wrap').find('.comment-input').val('');

                            },
                            dataType:'json',
                            async:true
                        });
                    });
                </script>
        <!--删除评论块-->
        <script type="text/javascript">
            $('.commentAll').on('click', '.removeBlock', function () {
                var comment = $('.comment-show').find('span').first().val();
                var id = $('.comment-pl-block').find('a').first('.removeBlock').attr('href');
                var gid = id.substr(22);
                var oT = $(this).parents('.date-dz-right').parents('.date-dz').parents('.comment-show-con-list').parents('.comment-show-con').parents('.comment-show');
                // 发送ajax
                $.ajax({
                    url: '/home/comment/destroy/{id}',
                    type: 'post',
                    data: {'id': gid},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (msg) {
                        // alert(msg);
                        if (msg == 'success') {
                            oT.remove();
                        }
                    },
                    dataType: 'html',
                    async: true
                });


            })
        </script>
                <!--点击回复动态创建回复块-->
                <script type="text/javascript">
                    $('.comment-show').on('click', '.pl-hf', function () {
                        //获取回复人的名字
                        var fhName = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
                        //回复@
                        var fhN = '回复@' + fhName;
                        var oInput = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.hf-con');
                        var fhHtml = '<div class="hf-con pull-left"> <textarea class="content comment-input hf-input" placeholder="" onkeyup="keyUP(this)"></textarea> <a href="javascript:;" class="hf-pl">评论</a></div>';
                        //显示回复
                        if ($(this).is('.hf-con-block')) {
                            $(this).parents('.date-dz-right').parents('.date-dz').append(fhHtml);
                            $(this).removeClass('hf-con-block');
                            $('.content').flexText();
                            $(this).parents('.date-dz-right').siblings('.hf-con').find('.pre').css('padding', '6px 15px');
                            //console.log($(this).parents('.date-dz-right').siblings('.hf-con').find('.pre'))
                            //input框自动聚焦
                            $(this).parents('.date-dz-right').siblings('.hf-con').find('.hf-input').val('').focus().val(fhN);
                        } else {
                            $(this).addClass('hf-con-block');
                            $(this).parents('.date-dz-right').siblings('.hf-con').remove();
                        }
                    });
                </script>
                <!--评论回复块创建-->
                <script type="text/javascript">
                    $('.comment-show').on('click', '.hf-pl', function () {
                        var oThis = $(this);
                        var myDate = new Date();
                        //获取当前年
                        var year = myDate.getFullYear();
                        //获取当前月
                        var month = myDate.getMonth() + 1;
                        //获取当前日
                        var date = myDate.getDate();
                        var h = myDate.getHours();       //获取当前小时数(0-23)
                        var m = myDate.getMinutes();     //获取当前分钟数(0-59)
                        if (m < 10) m = '0' + m;
                        var s = myDate.getSeconds();
                        if (s < 10) s = '0' + s;
                        var now = year + '-' + month + "-" + date + " " + h + ':' + m + ":" + s;
                        //获取输入内容
                        var oHfVal = $(this).siblings('.flex-text-wrap').find('.hf-input').val();
                        console.log(oHfVal)
                        var oHfName = $(this).parents('.hf-con').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
                        var oAllVal = '回复@' + oHfName;
                        if (oHfVal.replace(/^ +| +$/g, '') == '' || oHfVal == oAllVal) {

                        } else {
                            $.getJSON("json/pl.json", function (data) {
                                var oAt = '';
                                var oHf = '';
                                $.each(data, function (n, v) {
                                    delete v.hfContent;
                                    delete v.atName;
                                    var arr;
                                    var ohfNameArr;
                                    if (oHfVal.indexOf("@") == -1) {
                                        data['atName'] = '';
                                        data['hfContent'] = oHfVal;
                                    } else {
                                        arr = oHfVal.split(':');
                                        ohfNameArr = arr[0].split('@');
                                        data['hfContent'] = arr[1];
                                        data['atName'] = ohfNameArr[1];
                                    }

                                    if (data.atName == '') {
                                        oAt = data.hfContent;
                                    } else {
                                        oAt = '回复<a href="#" class="atName">@' + data.atName + '</a> : ' + data.hfContent;
                                    }
                                    oHf = data.hfName;
                                });

                                var oHtml = '<div class="all-pl-con"><div class="pl-text hfpl-text clearfix"><a href="#" class="comment-size-name">我的名字 : </a><span class="my-pl-con">' + oAt + '</span></div><div class="date-dz"> <span class="date-dz-left pull-left comment-time">' + now + '</span> <div class="date-dz-right pull-right comment-pl-block"> <a href="javascript:;" class="removeBlock">删除</a> <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a> <span class="pull-left date-dz-line">|</span> <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a> </div> </div></div>';
                                oThis.parents('.hf-con').parents('.comment-show-con-list').find('.hf-list-con').css('display', 'block').prepend(oHtml) && oThis.parents('.hf-con').siblings('.date-dz-right').find('.pl-hf').addClass('hf-con-block') && oThis.parents('.hf-con').remove();
                            });
                        }
                    });
                </script>


                <!--点赞-->
                <script type="text/javascript">
                    $('.comment-show').on('click', '.date-dz-z', function () {
                        var zNum = $(this).find('.z-num').html();
                        if ($(this).is('.date-dz-z-click')) {
                            zNum--;
                            $(this).removeClass('date-dz-z-click red');
                            $(this).find('.z-num').html(zNum);
                            $(this).find('.date-dz-z-click-red').removeClass('red');
                        } else {
                            zNum++;
                            $(this).addClass('date-dz-z-click');
                            $(this).find('.z-num').html(zNum);
                            $(this).find('.date-dz-z-click-red').addClass('red');
                        }
                    })
                </script>

            </div>


    </article>





<footer>
    <p>Design by <a href="http://www.blog.com" target="_blank">微博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#top" class="cd-top">Top</a>

</body>
</html>