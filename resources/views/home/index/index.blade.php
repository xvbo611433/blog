
@extends('home.layout.index');
@section('container')
    <article>
        <!--banner begin-->
        <div class="picsbox">
            <div class="banner">
                <div id="banner" class="fader">
                    @foreach($data as $k=>$v)
                    <li class="slide"><a href="/" target="_blank"><img src="{{ $v['image'] }}"><span
                                    class="imginfo">{{ $v['describe'] }}</span></a></li>
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
            @foreach($good as $k => $v)
                <div class="blogs" data-scroll-reveal="enter bottom over 1s">
                    <h3 class="blogtitle"><a href="/" target="_blank">{{$v['gname']}}</a></h3>
                    <span class="blogpic"><a href="/" title=""><img src="/home/images/toppic01.jpg" alt=""></a></span>
                    <p class="blogtext">{!!$v['abs']!!} </p>
                    <div class="bloginfo">
                        <ul>
                            <li class="author"><a href="/">杨青</a></li>
                            <li class="lmname"><a href="/">学无止境</a></li>
                            <li class="timer">2018-5-13</li>
                            <li class="view"><span>34567</span>已阅读</li>
                            <li class="like">9999</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        <!--blogsbox end-->
        <div class="sidebar">
            <div class="zhuanti">
                <h2 class="hometitle">特别推荐</h2>
                <ul>
                    <li><i><img src="/home/images/banner03.jpg"></i>
                        <p>帝国cms调用方法 <span><a href="/">阅读</a></span></p>
                    </li>
                    <li><i><img src="/home/images/b04.jpg"></i>
                        <p>5.20 我想对你说 <span><a href="/">阅读</a></span></p>
                    </li>
                    <li><i><img src="/home/images/b05.jpg"></i>
                        <p>个人博客，属于我的小世界！ <span><a href="/">阅读</a></span></p>
                    </li>
                </ul>
            </div>
            <div class="tuijian">
                <h2 class="hometitle">推荐文章</h2>
                <ul class="tjpic">
                    <i><img src="/home/images/toppic01.jpg"></i>
                    <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                </ul>
                <ul class="sidenews">
                    <li><i><img src="/home/images/toppic01.jpg"></i>
                        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="/home/images/toppic02.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="/home/images/v1.jpg"></i>
                        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="/home/images/v2.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                </ul>
            </div>
            <div class="tuijian">
                <h2 class="hometitle">点击排行</h2>
                <ul class="tjpic">
                    <i><img src="/home/images/toppic01.jpg"></i>
                    <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                </ul>
                <ul class="sidenews">
                    <li><i><img src="/home/images/toppic01.jpg"></i>
                        <p><a href="/">别让这些闹心的套路</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="/home/images/toppic02.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="/home/images/v1.jpg"></i>
                        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
                        <span>2018-05-13</span></li>
                    <li><i><img src="/home/images/v2.jpg"></i>
                        <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
                        <span>2018-05-13</span></li>
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
                    <li><a href="http://www.yangqq.com" target="_blank">杨青博客</a></li>
                    <li><a href="http://www.yangqq.com" target="_blank">D设计师博客</a></li>
                    <li><a href="http://www.yangqq.com" target="_blank">优秀个人博客</a></li>
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
                    <li class="wx"><img src="/home/images/wx.jpg"></li>
                </ul>
            </div>
        </div>
    </article>


@endsection


