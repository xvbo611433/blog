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
        <style type="text/css">
            body{

                background:url("/315845.jpg") no-repeat;
                background-size:100% ;/*设置背景图片大小*/
                background-attachment:fixed;/*固定背景*/
            }
         </style>
    </head>

    <body>


        <div class="res-banner">
            <div class="res-main">

                <div class="login-box">

                        <div class="am-tabs" id="doc-my-tabs">
                            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">

                                <li><a href="">注册</a></li>
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
                                          <div class="verification">
                                            <label for="code">
                                              <i class="am-icon-code-fork"></i>
                                            </label>
                                            <input type="tel" name="code" id="code" placeholder="请输入验证码">
                                            <a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
                                              <span id="dyMobileButton">获取</span></a>
                                          </div>
                                          <div class="user-pass">
                                            <label for="password">
                                              <i class="am-icon-lock"></i>
                                            </label>
                                            <input type="password" name="password" id="password" placeholder="设置密码"></div>

                                         <div class="am-cf">
                                            <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                        </div>
                                        </form>



                                    <hr>
                                </div>
                                <script type="text/javascript">
                                function sendMobileCode(){
                                   var phone = $('#phone').val();
                                  


                                    $.ajax({
                                        url:'/home/login/sendMobileCode',
                                        data:{'phone':phone},
                                        datatype:'json',
                                        async:true,
                                        success:function(msg){
                                            if(msg.code == 2){
<<<<<<< HEAD
                                             // alert('发送成功');
=======
                                             console.log('ok');
>>>>>>> 25d153717e7f36d5cc1f9b496b51e7f6a8f696e2
                                            }else{
                                                console.log(msg.msg);
                                            }
                                        }
                                    });
                                    // $.get('/home/login/sendMobileCode',{'phone':phone},function(msg){
                                    //     alert(msg);
                                    // },'json');
                                }


                                </script>
                                <script>
                                    $(function() {
                                        $('#doc-my-tabs').tabs();
                                      })
                                </script>
                        </form>



                        <hr>
                    </div>

                    <script>
                        $(function () {
                            $('#doc-my-tabs').tabs();
                        })
                    </script>

                </div>
            </div>

        </div>
    </div>


</body>

</html>
