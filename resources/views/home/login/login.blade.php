
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

<h1>登录表单</h1>

<div class="container w3layouts agileits">

    <div class="login w3layouts agileits">
        <h2>登 录</h2>
        <form action="/info" method="post">
            {{ csrf_field() }}
            <input type="text" Name="username" placeholder="用户名" ><br><br>
            <input type="password" Name="password" placeholder="密码" ><br><br>
            <a href="/home/forget" style="text-decoration:underline;">忘记密码?</a>
            <div class="send-button w3layouts agileits">
                <input type="submit" value="登 录"><a href="/register" class="login-register">注册</a>

            </div>
        </form>
        <div class="clear"></div>
    </div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>


    <div class="clear"></div>

</div>

<div class="footer w3layouts agileits">
    <p>Copyright &copy; More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</div>

</body>
<!-- //Body -->

</html>