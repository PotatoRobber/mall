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
        .totalmoney{
            font-size: 70px;
        }
        .button{
            width: 10%;
            height: 50px;
            background-color: #d15a18;
            color: #ffffff;
            line-height: 50px;
            border-radius: 3%;
            text-align: center;
            cursor:pointer;
            margin: 0 auto;
        }
        .button:hover{
            background-color: #9c4412;
        }
        .wx {
            text-align: center;
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
                    <p><span>Cart</span><div id="dd" class="wrapper-dropdown-2"> (empty)
                    <ul class="dropdown">
                        <li>you have no items in your Shopping cart</li>
                    </ul></div></p>
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

            <div>
                <div class="wx">
                    <div class="totalmoney">您共消费<?php echo ($totalmoney); ?>元</div>
                    <img  width="500px" src="/mall/Public/UserInterface/images/20160618162754_88c55ffc0c3fe7b8c9fbbbe9b3c7fc4b_2.jpeg"/>
                </div>
            </div>
            <a href="alreadypaid">
            <div class="button">
                已支付
            </div>
            </a>


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