<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
<title>Preview</title>
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
					     		<form action="search" method="post">
					     			<input type="text" name="searchtext" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
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
    		<p><a href="index">首页</a> &gt;&gt; <a href="#" class="active">详情</a></p>
    	    </div>
    		<div class="clear"></div>
    	</div>
   	 	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<img src="/mall/<?php echo ($data["product_img"]); ?>" alt="" />
				  </div>
				<div class="desc span_3_of_2">
					<h2><?php echo ($data["product_name"]); ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
					<div class="price">
						<p>价格: <span>￥<?php echo ($data["product_price"]); ?></span></p>
					</div>
					<div class="available">
						<ul>
						  <li><span>Model:</span> &nbsp; Model 1</li>
						  <li><span>Shipping Weight:</span>&nbsp; 5lbs</li>
						  <li><span>库存:</span>&nbsp; <?php echo ($data["product_count"]); ?>件</li>
					    </ul>
					</div>
				<div class="share-desc">
					<div class="share">
						<form action="addproduct" method="post" name="cardform">
							<p>购物数量 :</p>
							<input type="hidden" name="productid" value="<?php echo ($data["productid"]); ?>">
							<input class="text_box" type="number" name="number" value="1" min="1" max="<?php echo ($data["product_count"]); ?>">
						</form>
					</div>
					<div class="button"><span><a href="#" onclick="subform()">加入购物车</a></span></div>
					<div class="clear"></div>
				</div>
				 <div class="wish-list">
				 	<ul>
				 		<li class="wish"><a href="#">Add to Wishlist</a></li>
				 	    <li class="compare"><a href="#">Add to Compare</a></li>
				 	</ul>
				 </div>
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			 <h2>详情说明 :</h2>
			<p><?php echo ($data["product_detail"]); ?></p>
	           <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>-->
	   </div>
   </div>
				<div class="rightsidebar span_3_of_1 sidebar">
					<h2>推荐商品</h2>
					<?php if(is_array($redata)): $i = 0; $__LIST__ = $redata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="special_movies">
					 	   <div class="movie_poster">
					 		  <a href="preview?pid=<?php echo ($vo["productid"]); ?>"><img width="150" src="/mall/<?php echo ($vo["product_img"]); ?>" alt="" /></a>
					 		 </div>
					 		   <div class="movie_desc">
							    <h3><a href="preview?pid=<?php echo ($vo["productid"]); ?>"><?php echo ($vo["product_name"]); ?></a></h3>
								   <p><span>$<?php echo ($vo["oprice"]); ?></span> &nbsp; $<?php echo ($vo["product_price"]); ?></p>
								     <span><a href="preview?pid=<?php echo ($vo["productid"]); ?>">查看详情</a></span>
								 </div>
								<div class="clear"></div>
					 		</div><?php endforeach; endif; else: echo "" ;endif; ?>

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