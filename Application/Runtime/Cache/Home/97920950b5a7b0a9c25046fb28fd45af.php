<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>商品管理</h1>
<a href="/mall/index.php/Home/Index/addproduct">新增</a>
<table border="1" cellpadding="0" cellspacing="0" width="1200">
    <tr>
        <th>商品编号</th>
        <th>商品名称</th>
        <th>类型名称</th>
        <th>商品价格</th>
        <th>商品图片地址</th>
        <th>商品详情</th>
        <th>商品库存</th>
        <th>商品是否显示</th>
        <th>商品排序</th>
        <th>商品是否推荐</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["productid"]); ?></td>
            <td><?php echo ($vo["product_name"]); ?></td>
            <td><?php echo ($vo["type_name"]); ?></td>
            <td><?php echo ($vo["product_price"]); ?></td>
            <td><?php echo ($vo["product_img"]); ?></td>
            <td><?php echo ($vo["product_detail"]); ?></td>
            <td><?php echo ($vo["product_count"]); ?></td>
            <td><?php echo ($vo["is_show"]); ?></td>
            <td><?php echo ($vo["product_sort"]); ?></td>
            <td><?php echo ($vo["is_recommend"]); ?></td>
            <td>
                <a href="/mall/index.php/Home/Index/updateproduct?pid=<?php echo ($vo["productid"]); ?>">修改</a>
                <a href="/mall/index.php/Home/Index/delproduct?pid=<?php echo ($vo["productid"]); ?>" ONCLICK="return confirm('确认删除？')">删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<?php echo ($page); ?><!--控制器传来的html标签-->
</body>
</html>