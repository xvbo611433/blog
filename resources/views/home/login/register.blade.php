<!DOCTYPE html>
<html>

<!-- Head -->
<head>

    <title>登录表单</title>

    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta-Tags -->

    <!-- Style --> <link rel="stylesheet" href="/home/register/css/style.css" type="text/css" media="all">



</head>
<!-- //Head -->

<!-- Body -->
<body>

<h1></h1>

<div class="container w3layouts agileits">

    <div class="login w3layouts agileits">



    </div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
    <div class="register w3layouts agileits">
        <h2>注 册</h2>
        <form action="/comment" method="post">
            {{ csrf_field() }}
            用户名：<input type="text" name="username" placeholder="账号" required=""><br><br>
            邮  箱：<input type="text" name="email" placeholder="邮箱" required=""><br><br>
            密  码：<input type="password" name="password" placeholder="密码" required=""><br><br>
            手机号：<input type="text" name="tel" placeholder="手机号码" required=""><br><br>
            <div class="send-button w3layouts agileits">
                <input type="submit" value="提交">
            </div>
        </form>

    </div>

    <div class="clear"></div>

</div>

<div class="footer w3layouts agileits">
    <p>Copyright &copy; More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</div>

</body>
<!-- //Body -->

</html>