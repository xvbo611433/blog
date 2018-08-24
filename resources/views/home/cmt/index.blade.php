<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="container">

<table>
    <tr>
        <td>留言:<textarea name="content" id="leaveword" cols="30" rows="3" class="form-control"></textarea></td>
    </tr>
    <tr>
        <td>姓名:<input type="text" name="uname" id="leavename" class="form-control"></td>
    </tr>
    <tr>
        <td>
            <button type="button" class="btn btn-primary" value="提交" id="subleave" style="margin-top: 10px">提交留言</button>
        </td>
    </tr>
</table>



</body>
</html>


    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
<script>    // *获取提交按钮,给点击事件
    $('#subleave').on('click',function (){
        var leavecontent = $('#leaveword').val();
        var uname = $('#leavename').val();    //获取对应的值
        // console.log(uname);
        $.ajax({    //发送ajax请求,对应4个参数,url,data,type,datatype
            url:"/home/cm",
            data:{content:leavecontent,uname:uname},
            type:'post',
            dataType:'html',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res)    //执行成功回调函数
            {        
                console.log(res);
            }
        })
    })
</script>