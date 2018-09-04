<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>忘记密码</title>
<link type="text/css" href="/home/css/css.css" rel="stylesheet" />
<link href="/home/css/vendor11.css" rel="stylesheet">
<link href="/home/css/login.css" rel="stylesheet">

<script src="/home/js/jquery-3.2.1.min.js"></script>

</head>

<body>

  <div class="content">
    <div class="LoginHeader-1jXn6" style="margin-top:20px;">
        <h1>微博客</h1>
    </div>
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写用户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div>
	
	@if(session('error')) 
        <div id="code" style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;margin-left:320px;position:absolute;z-index:1; opacity:0.9;">{{session('error')}}</div>
    @endif
    <script>
        $('#code,.mws-form-message').delay(2000).fadeOut(10); 
    </script>

    <script>
 
            function sendMobileCode(){
               var phone = $('#phone').val();
                $.ajax({
                    url:'/home/login/sendMobileCode',
                    data:{'phone':phone},
                    datatype:'json',
                    async:true,
                    success:function(msg){
                        if(msg.code == 2){


                         console.log('ok');

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

                                


   

     <form action="/home/doforget2" method="post" class="forget-pwd">
      {{ csrf_field() }}
       <section class="MessageLogin-FsPlX" style="width:330px;">
        <input type="text" name="phone" id="phone" maxlength="11" placeholder="手机号">
           
        </section>
        <section class="MessageLogin-FsPlX" style="width:330px;">
                <input type="tel" name="code" id="code" placeholder="请输入验证码">
                <a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
                  <span id="dyMobileButton">获取</span></a>
        </section>
       
       <button class="tijiao" style="background-color:#f60;margin-top:30px;margin-left: 90px;">提交
      </button>
      </form>
   </div>
  </div>
  
</body>
</html>