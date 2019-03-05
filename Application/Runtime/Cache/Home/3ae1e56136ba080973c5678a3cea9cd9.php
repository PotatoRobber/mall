<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            background-color: rgba(247, 145, 49, 0.67);
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .button {
            background-color: rgba(117, 175, 19, 0.87); /* Green */
            border: none;
            color: #fff6f9;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5%;
        }
        .button:hover {
            background-color: #af4e1e;
            color: white;
        }
        .bigbox{
            width: 500px;
            background-color: rgba(175, 78, 30, 0.75);
            border-radius: 5%;
            margin: 0 auto;
            padding: 5%;
        }
        span{
            color: #ffffff;
        }
        .title{
            font-size: 50px;
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
</head>
<body>
<h1 class="title">商城后台管理系统</h1>
<div class="bigbox">
    <h1>管理员登录</h1>
    <form action="login" method="post">
        <span>账号：</span><input type="text" name="adminuser" onblur="sendquery(this)"><p></p>
        <span>密码：</span><input type="password" name="adminpsw"><p></p>
        <span>验证码：</span><input name="verify" width="20%" height="50" class="captcha-text"  type="text"><p></p>
        <input type="submit" class="button" value="登录">
    </form>
    <img id="verify_img" width="35%" class="left15" height="70" alt="验证码" src="<?php echo U('Home/Login/verify_c',array());?>" title="点击刷新">

</div>
</body>
</html>

<script>
    var xmlhttp;
    var opuesrname;
    function createObj() {
        if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else {
            //ie5,6
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
        }
    }
    
    function  sendquery(op) {
        if (op.value==''){
            return;
        }
        createObj();
        var uname = op.value;
        opuesrname=op;
        xmlhttp.open("get","queryname?uname="+uname,true);
        xmlhttp.onreadystatechange=jiaowo;
        xmlhttp.send();
    }

    function jiaowo() {
        if (xmlhttp.readyState==4&&xmlhttp.status==200){
            var result=xmlhttp.responseText;
            if (result==0){
                alert("账号不存在!");

            }
        }
    }
    //点击验证码刷新


    var captcha_img = $('#verify_img');
    var verifyimg = captcha_img.attr("src");
    captcha_img.attr('title', '点击刷新');
    captcha_img.click(function(){
        if( verifyimg.indexOf('?')>0){
            $(this).attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });

</script>