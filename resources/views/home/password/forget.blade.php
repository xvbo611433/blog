<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>忘记密码</title>
<link type="text/css" href="/home/css/css.css" rel="stylesheet" />
<link href="/home/css/vendor11.css" rel="stylesheet">
<link href="/home/css/login.css" rel="stylesheet">
</head>

<body>
 
  <div class="content">
    <div class="LoginHeader-1jXn6" style="margin-top:20px;">
        <h1>微博客</h1>
    </div>
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写用户名</strong></div>
       <div class="liutext"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div>

    @if(session('error')) 
        <div id="code" style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;margin-left:320px;position:absolute;z-index:1; opacity:0.9;">{{session('error')}}</div>
    @endif

    <script src="/home/js/jquery-3.2.1.min.js"></script>
    <script>
        $('#code,.mws-form-message').delay(2000).fadeOut(10); 
    </script>


     <form action="/home/doforget" method="post" class="forget-pwd">
       {{ csrf_field() }}
      <section class="form-b6px1" style="width:330px;">
          <input type="text" name="uname" placeholder="用户名">
      </section>
                <section class="form-b6px1">
                        <input type="text" name="code" maxlength="6" placeholder="验证码">
        
            <img src="/home/code/1" style="float: right;" title="点击切换" onclick="rand_code(this)">
          
                </section>

      <button class="tijiao" style="background-color:#f60;margin-top:30px;margin-left: 90px;">提交
      </button>
      </form>
   </div>
  </div>
  
</body>

  <script>  
        function re_captcha() {
            $url = "{{ URL('home/code') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('huan').src=$url;
          }
  </script>

      <script type="text/javascript">
          function rand_code(obj){
              // console.log(obj.src)
              obj.src = obj.src+'?a='+Math.random();
          }
      </script>            

</html>
