<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>新增类型</h1>
    <form action="addnewtype" method="post">
        类型名称 <input type="text" name="typename"><p></p>
        类型说明 <textarea name="typenote" id="" cols="50" rows="15"></textarea><p></p>
        <input type="submit" value="添加">
    </form>
</body>
</html>