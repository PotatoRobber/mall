<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<link rel="stylesheet" href="/mall/Public/css/mystyle.css">-->
    <link rel="stylesheet" href="/mall/Public/css/mystyle.css">
    <style>
        a{
            color: darkred;
            text-decoration: none;
        }
        .left{
            /*background-color: #d17672;*/
            /*height: 1500px;*/
        }
        .left a:hover{
            /*display: inline-block;*/
            padding: 5px;
            background-color: #d17672;
            color: white;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="top">
            <h1>后台首页</h1>
        </div>
        <div class="content">
            <div class="left floatleft">
                <!--<h2>欢迎！<?php echo ($_SESSION['user']['admin_name']); ?></h2>-->
                <h2><a href="typemsg" target="yframe">类型管理</a></h2>
                <h2><a href="productmsg" target="yframe">商品管理</a></h2>
            </div>
            <div class="right floatleft">
                <iframe name="yframe" src="welcome.html"  frameborder="0" width=100%  height="1600"></iframe>
            </div>

        </div>
    </div>
</body>
</html>