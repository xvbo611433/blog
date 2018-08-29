<!DOCTYPE html>
<html>

    <head lang="en">
        <meta charset="UTF-8">
        <title>注册</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />

        <link rel="stylesheet" href="/home/phone/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
        <link href="/home/phone/css/dlstyle.css" rel="stylesheet" type="text/css">
        <script src="/home/phone/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
        <script src="/home/phone/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

    </head>

    <body>


        <div class="res-banner">
            <div class="res-main">

                <div class="login-box">

                        <div class="am-tabs" id="doc-my-tabs">
                            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">

                                <li><a href="">手机号注册</a></li>
                            </ul>

                            <div class="am-tabs-bd">
                                <div class="am-tab-panel">
                                        <form method="post" action="/home/login/store">
                                        <input type="hidden" name="method" value="phone">
                                         {{ csrf_field() }}
                                          <div class="user-phone">
                                            <label for="phone">
                                              <i class="am-icon-mobile-phone am-icon-md"></i>
                                            </label>
                                            <input type="tel" name="username" id="phone" placeholder="请输入手机号"></div>
<!--                                           <div class="verification">
                                            <label for="code">
                                              <i class="am-icon-code-fork"></i>
                                            </label>
                                            <input type="tel" name="code" id="code" placeholder="请输入验证码">
                                            <a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
                                              <span id="dyMobileButton">获取</span></a>
                                          </div> -->
                                          <div class="user-pass">
                                            <label for="password">
                                              <i class="am-icon-lock"></i>
                                            </label>
                                            <input type="password" name="password" id="password" placeholder="设置密码"></div>

                                         <div class="am-cf">
                                            <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                        </div>
                                        </form>
                                 <div class="login-links">
                                        <label for="reader-me">
                                            <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                                        </label>
                                </div>


                                    <hr>
                                </div>
                                <script type="text/javascript">
                                function sendMobileCode(){
                                   var phone = $('#phone').val();
                                   console.log(phone);


                                    $.ajax({
                                        url:'/home/login/sendMobileCode',
                                        data:{'phone':vphone},
                                        datatype:'json',
                                        async:true,
                                        success:function(msg){
                                            if(msg.code == 2){
                                             alert('发送成功');
                                            }else{
                                                alert(msg.msg);
                                            }
                                        }
                                    });
                                    $.get('/home/login/sendMobileCode',{'phone':vphone},function(msg){
                                        alert(msg);
                                    },'json');
                                }


                                </script>
                                <script>
                                    $(function() {
                                        $('#doc-my-tabs').tabs();
                                      })
                                </script>

                            </div>
                        </div>

                </div>
            </div>

                    <div class="footer ">
                        <div class="footer-hd ">
                            <p>
                                <a href="# ">恒望科技</a>
                                <b>|</b>
                                <a href="# ">商城首页</a>
                                <b>|</b>
                                <a href="# ">支付宝</a>
                                <b>|</b>
                                <a href="# ">物流</a>
                            </p>
                        </div>
                        <div class="footer-bd ">
                            <p>
                                <a href="# ">关于恒望</a>
                                <a href="# ">合作伙伴</a>
                                <a href="# ">联系我们</a>
                                <a href="# ">网站地图</a>
                                <em>© 2015-2025 Hengwang.com 版权所有</em>
                            </p>
                        </div>
                    </div>
    </body>

</html>
