<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>用户登录</h1>
    <form action="login" method="post">
        账号：<input type="text" name="adminuser"><p></p>
        密码：<input type="password" name="adminpsw"><p></p>
        <input type="submit" value="登录">
    </form>
</body>
</html>