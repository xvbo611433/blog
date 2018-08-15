
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{$title}}</title>
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/admin/1.png" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
  <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
      <script src="{{url()}}/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script> 

</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">后台管理登录</div>
        <div id="darkbannerwrap">
      <!-- 读取模版的提示信息 -->
       @if(session('success'))
        <script>
            sweetAlert("{{session('error')}}");
        </script>
        @endif        
        @if(session('error'))
            <script>
                /* alert('温馨提示：{{session('error')}}');*/
                  sweetAlert("{{session('error')}}");
            </script>     
        @endif
        </div>

 
        <form action='login/gologin' method="post"  >
        {{csrf_field()}}
            <input name="uname" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="upwd" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <div>
            <img src="/code" style="float: right;" title="点击切换" onclick="rand_code(this)"><input type="text" name="code" lay-verify="required" placeholder="请输入验证码"  class="layui-input" style="width: 130px;">
            </div>
              <script type="text/javascript">
                    function rand_code(obj){
                        // console.log(obj.src)
                        obj.src = obj.src+'?a='+Math.random();
                    }
                </script>            
      
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
</body>
</html>