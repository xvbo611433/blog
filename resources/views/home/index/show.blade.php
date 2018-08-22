@extends('home.layout.index');

@section('title',$title)
@section('container')
    <article>
        <h1 class="t_nav"><span>您现在的位置是：首页 &gt; 慢生活 &gt; 程序人生</span><a href="/" class="n1">网站首页</a><a href="/"
                                                                                                      class="n2">慢生活</a>
        </h1>
        <div class="infosbox">
            <div class="newsview">

                <h3 class="news_title">{{$essay['gname']}}</h3>
                <div class="bloginfo">
                    <ul>
                        <li class="author"><a href="/">杨青</a></li>
                    <!-- <li class="lmname"><a href="/">{{$essay['goods_cate']['cname']}}</a></li> -->
                        <li class="timer">{{$essay['updated_at']}}</li>
                        <li class="view">4567已阅读</li>
                        <li class="like">8888888</li>
                    </ul>
                </div>

                <div class="tags"><a href="/" target="_blank">个人博客</a> &nbsp; <a href="/" target="_blank">小世界</a></div>
                <div class="news_about"><strong>简介</strong>{{$essay['abs']}}</div>
                <div class="news_con">
                    本文很长，记录了我博客建站初到现在的过程，还有我从毕业到现在的一个状态，感谢您的阅读，如果你还是学生，也许你能从此文中，找到我们曾经相似的地方。如果你已经工作，有自己的博客，我想，你并没有忘记当初建立个人博客的初衷吧！<br>
                    {!!$essay['content']!!} </div>
            </div>
            <div class="share">
                <p class="diggit"><a
                            href="JavaScript:makeRequest('/e/public/digg/?classid=3&amp;id=19&amp;dotop=1&amp;doajax=1&amp;ajaxarea=diggnum','EchoReturnedText','GET','');">
                        很赞哦！ </a>(<b id="diggnum">
                        <script type="text/javascript"
                                src="/e/public/ViewClick/?classid=2&amp;id=20&amp;down=5"></script>
                        13</b>)
                </p>
                <p class="dasbox"><a href="javascript:void(0)" onclick="dashangToggle()" class="dashang"
                                     title="打赏，支持一下">打赏本站</a></p>
                <div class="hide_box"></div>
                <div class="shang_box"><a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()"
                                          title="关闭">关闭</a>
                    <div class="shang_tit">
                        <p>感谢您的支持，我会继续努力的!</p>
                    </div>
                    <div class="shang_payimg"><img src="images/alipayimg.jpg" alt="扫码支持" title="扫一扫"></div>
                    <div class="pay_explain">扫码打赏，你说多少就多少</div>
                    <div class="shang_payselect">
                        <div class="pay_item checked" data-id="alipay"><span class="radiobox"></span> <span
                                    class="pay_logo"><img src="images/alipay.jpg" alt="支付宝"></span></div>
                        <div class="pay_item" data-id="weipay"><span class="radiobox"></span> <span
                                    class="pay_logo"><img src="images/wechat.jpg" alt="微信"></span></div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $(".pay_item").click(function () {
                                $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
                                var dataid = $(this).attr('data-id');
                                $(".shang_payimg img").attr("src", "images/" + dataid + "img.jpg");
                                $("#shang_pay_txt").text(dataid == "alipay" ? "支付宝" : "微信");
                            });
                        });

                        function dashangToggle() {
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
                    <li><a href="/download/div/2018-02-22/798.html" title="html5时尚个人博客模板-技术门户型">html5时尚个人博客模板-技术门户型</a>
                    </li>
                    <li><a href="/download/div/2017-09-08/789.html"
                           title="html5个人博客模板主题《心蓝时间轴》">html5个人博客模板主题《心蓝时间轴》</a></li>
                    <li><a href="/download/div/2017-07-16/785.html" title="古典个人博客模板《江南墨卷》">古典个人博客模板《江南墨卷》</a></li>
                    <li><a href="/download/div/2017-07-13/783.html" title="古典风格-个人博客模板">古典风格-个人博客模板</a></li>
                    <li><a href="/download/div/2015-06-28/748.html" title="个人博客《草根寻梦》—手机版模板">个人博客《草根寻梦》—手机版模板</a></li>
                    <li><a href="/download/div/2015-04-10/746.html" title="【活动作品】柠檬绿兔小白个人博客模板">【活动作品】柠檬绿兔小白个人博客模板</a>
                    </li>
                    <li><a href="/jstt/bj/2015-01-09/740.html" title="【匆匆那些年】总结个人博客经历的这四年…">【匆匆那些年】总结个人博客经历的这四年…</a>
                    </li>
                </ul>
            </div>
            <div class="news_pl">
                <h2>文章评论</h2>
                <div class="container">
                    <div class="commentbox">
                        <textarea style="width: 750px;height: 100px;" placeholder="请先登陆......" class="mytextarea" readonly="" id="content"></textarea><br>
                        <a href="/home/comment/{{ $essay['gid'] }}" class=".btn"><span style="width: 50px;height: 45px;border:1px solid grey;padding: 10px;border-radius: 5px;background:orange">评论</span></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="zhuanti">
                <h2 class="hometitle">特别推荐</h2>
                <ul>
                    <li><i><img src="images/banner03.jpg"></i>
                        <p>帝国cms调用方法 <span><a href="/">阅读</a></span></p>
                    </li>
                    <li><i><img src="images/b04.jpg"></i>
                        <p>5.20 我想对你说 <span><a href="/">阅读</a></span></p>
                    </li>
                    <li><i><img src="images/b05.jpg"></i>
                        <p>个人博客，属于我的小世界！ <span><a href="/">阅读</a></span></p>
                    </li>
                </ul>
            </div>
            <div class="tuijian">
                <h2 class="hometitle">推荐文章</h2>
                <ul class="tjpic">
                    <i><img src="images/toppic01.jpg"></i>
                    <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                </ul>
                <ul class="sidenews">
                    <li><i><img src="images/toppic01.jpg"></i>
                        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="images/toppic02.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="images/v1.jpg"></i>
                        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="images/v2.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                </ul>
            </div>
            <div class="tuijian">
                <h2 class="hometitle">点击排行</h2>
                <ul class="tjpic">
                    <i><img src="images/toppic01.jpg"></i>
                    <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                </ul>
                <ul class="sidenews">
                    <li><i><img src="images/toppic01.jpg"></i>
                        <p><a href="/">别让这些闹心的套路</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="images/toppic02.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="images/v1.jpg"></i>
                        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="images/v2.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                </ul>
            </div>
            <div class="cloud">
                <h2 class="hometitle">标签云</h2>
                <ul>
                    <a href="/">陌上花开</a> <a href="/">校园生活</a> <a href="/">html5</a> <a href="/">SumSung</a> <a href="/">青春</a>
                    <a href="/">温暖</a> <a href="/">阳光</a> <a href="/">三星</a><a href="/">索尼</a> <a href="/">华维荣耀</a> <a
                            href="/">三星</a> <a href="/">索尼</a>
                </ul>
            </div>
            <div class="guanzhu" id="follow-us">
                <h2 class="hometitle">关注我们 么么哒！</h2>
                <ul>
                    <li class="sina"><a href="/" target="_blank"><span>新浪微博</span>杨青博客</a></li>
                    <li class="tencent"><a href="/" target="_blank"><span>腾讯微博</span>杨青博客</a></li>
                    <li class="qq"><a href="/" target="_blank"><span>QQ号</span>476847113</a></li>
                    <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span>dancesmiling@qq.com</a></li>
                    <li class="wxgzh"><a href="/" target="_blank"><span>微信号</span>yangqq_1987</a></li>
                    <li class="wx"><img src="images/wx.jpg"></li>
                </ul>
            </div>
        </div>
    </article>





@endsection