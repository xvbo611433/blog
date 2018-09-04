<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>忘记密码</title>
<link type="text/css" href="/home/css/css.css" rel="stylesheet" />
</head>
<body>

  <div class="content">
    <div class="LoginHeader-1jXn6" style="margin-top:20px;text-align:center;">
        <h1>微博客</h1>
    </div>
    <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写用户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext for-cur"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext for-cur"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div>
      <div class="successs">
       <h3>恭喜您，修改成功！</h3>
       <p style="color:#A0CD4E;font-size:15px;font-weight:bold;">3秒之后，
        <a href="/" style="text-decoration:underline;color:#09A3DC;">返回首页</a>
       </p>
       <?php
          header('refresh:3;url=/');
       ?>
      </div>
   </div>
  </div>
</div>
 
</body>
</html>
