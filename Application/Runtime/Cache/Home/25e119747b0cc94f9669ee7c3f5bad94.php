<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>新增类型</h1>
<form action="addnewproduct" method="post" enctype="multipart/form-data">
    商品名称 <input type="text" name="product_name"><p></p>
    <!--类型编号 <input type="text" name="type_id"><p></p>-->
    类型名称 <select name="type_id" id="type_id">
                <?php if(is_array($typedata)): $i = 0; $__LIST__ = $typedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p["type_id"]); ?>"><?php echo ($p["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
            </select><p></p>
    商品价格 <input type="text" name="product_price"><p></p>
    商品图片地址 <input type="file" name="product_img" ><p></p>
    商品详情 <textarea name="product_detail" id="" cols="50" rows="15"></textarea><p></p>
    商品库存 <input type="text" name="product_count"><p></p>
    商品是否显示 <input type="text" name="is_show"><p></p>
    商品排序 <input type="text" name="product_sort"><p></p>
    商品是否推荐 <input type="text" name="is_recommend"><p></p>
    <input type="submit" value="添加">
</form>
</body>
</html>