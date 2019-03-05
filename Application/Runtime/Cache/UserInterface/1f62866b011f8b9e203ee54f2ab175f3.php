<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
    <title>order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/mall/Public/UserInterface/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/move-top.js"></script>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/easing.js"></script>
    <style>
        .listcar li:hover{
            background-color: rgba(215, 78, 25, 0.71);
            color: #eeeeee;
        }
        .buybutton{
            width: 80%;
            padding: 10%;
            background-color: rgba(215, 90, 104, 0.78);
            border-radius: 1%;
            text-align: center;
            line-height: 3px;
            color: #ffffff;
            margin: 0 auto;
        }
        .buybutton:hover{
            background-color: rgba(255, 65, 73, 0.91);
        }
    </style>
</head>
<body>
<div class="header">
    <div class="headertop_desc">
        <div class="wrap">
            <div class="nav_list">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="contact.html">Sitemap</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="account_desc">
                <ul>
                    <li><a href="contact.html">Register</a></li>
                    <li><a href="contact.html">Login</a></li>
                    <li><a href="preview.html">Delivery</a></li>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">My Account</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.html"><img src="/mall/Public/UserInterface/images/logo.png" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="cart">
                    <p>
                        <span>Cart</span><div id="dd" class="wrapper-dropdown-2">
                    <ul class="dropdown listcar" style="z-index: 10">
                        <?php if(is_array($car)): $i = 0; $__LIST__ = $car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><a href="preview?pid=<?php echo ($p["productid"]); ?>"><li><?php echo ($i); ?>. <?php echo ($p["product_name"]); ?>&nbsp;&nbsp;<?php echo ($p["product_price"]); ?>元</li></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <a href="showcar"><div class="buybutton">去结算</div></a>
                    </ul></div>
                    </p>
                </div>
                <div class="search_box">
                    <form>
                        <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });
            </script>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="main">
    <div class="wrap">
        <div class="content_top">
            <div class="back-links">
                <p><a href="index">首页</a> &gt;&gt; <a href="#" class="active">订单详情</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <h2><span>编号订单：</span><span><?php echo ($orderid); ?></span></h2>
                <br>
                <style>
                    table{
                        width: 100%;

                    }
                    table td{
                        border:rgba(251,114,50,0.72) 1px solid;
                        height: 30px;
                    }
                    .paybutton{
                        width: 10%;
                        height: 50px;
                        background-color: #d15a18;
                        color: #ffffff;
                        line-height: 50px;
                        border-radius: 3%;
                        text-align: center;
                        cursor:pointer;

                    }
                    .paybutton:hover{
                        background-color: #9c4412;
                    }
                </style>
                <table  border="1" class="">
                    <tr>
                        <td>序号</td>
                        <td>商品名称</td>
                        <td>价格</td>
                        <td>购物数量</td>
                        <td>小计</td>

                    </tr>
                    <?php if(is_array($car)): $i = 0; $__LIST__ = $car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($i); ?></td>
                            <td><?php echo ($p["product_name"]); ?></td>
                            <td><?php echo ($p["product_price"]); ?></td>
                            <td><?php echo ($p["number"]); ?></td>
                            <td><?php echo ($p["xj"]); ?></td>

                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="clear"></div>
                <div class="wish-list">
                    <h3>总金额：<?php echo ($totalmoney); ?>元</h3>
                </div>
                <div class="wish-list">
                    <ul>
                        <li class="wish"><a href="index">继续购买</a></li>
                        <li class="paybutton" ><a href="pay" style="
                        color: #ffffff;
                        line-height: 50px;
                        border-radius: 3%;
                        text-align: center;
                        text-decoration: none;
                        padding-left: 0;
                        font-size: 20px;
                        ">付款</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="footer">
    <div class="wrap">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Orders and Returns</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.html">Site Map</a></li>
                    <li><a href="#">Search Terms</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="contact.html">Sign In</a></li>
                    <li><a href="index.html">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="contact.html">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
                        <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Copyright &copy; 2014.Company name All rights reserved.</p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
<script>
    function subform() {
        document.cardform.submit();
    }
</script>
</html>