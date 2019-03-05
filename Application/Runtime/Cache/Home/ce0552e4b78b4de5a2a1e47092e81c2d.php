<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>类型管理</h1>
    <a href="addtype.html">新增</a>
    <table border="1" cellpadding="0" cellspacing="0" width="800">
        <tr>
            <th>类型编号</th>
            <th>类型名称</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($typedata)): $i = 0; $__LIST__ = $typedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["type_id"]); ?></td>
                <td><?php echo ($vo["type_name"]); ?></td>
                <td><?php echo ($vo["type_note"]); ?></td>
                <td>
                    <a href="updatetype?tid=<?php echo ($vo["type_id"]); ?>">修改</a>
                    <a href="deltype?tid=<?php echo ($vo["type_id"]); ?>" ONCLICK="return confirm('确认删除？')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</body>
</html>