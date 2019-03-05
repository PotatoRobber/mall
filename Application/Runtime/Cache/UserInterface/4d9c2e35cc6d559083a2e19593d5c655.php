<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
<title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/mall/Public/UserInterface/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/mall/Public/UserInterface/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/move-top.js"></script>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/easing.js"></script>
    <script type="text/javascript" src="/mall/Public/UserInterface/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
    </script>
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
        .header_bottom_right{
            position: relative;
        }
        .classifyMenu{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
            background-color: #f5f5f5;
            width: 100%;
            height: 100%;
			border: 2px solid sandybrown;
			display: none;
			padding: 0 3%;
        }
        .nodisplay{
            display: none;
        }
        .yesdisplay{
            display: block;
        }
		.block{
			margin-bottom: 20px;
		}
		.menuli{
			float: left;
			margin: 2% 2% ;
		}
		.categories ul li{
			height: auto;
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
							<li><a href="showuserregister">用户注册</a></li>
							<li><a href="showuserlogin">
								            <?php
 if(!isset($_SESSION['userdata'])){ echo '用户登录'; }else{ echo '当前用户：'.$_SESSION['userdata']['user_name']; } ?>
								    </a></li>
							<li><a href="#">Delivery</a></li>
							<li><a href="#">Checkout</a></li>

						</ul>
					</div>
				<div class="clear"></div>
			</div>
	  	</div>
  	  		<div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="index"><img src="images/logo.png" alt="" /></a>
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
					     			<input type="text" name="searchtext" value="小米" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '小米';}"><input type="submit" value="">
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
				<div class="header_bottom" onmouseleave="removeclassify()">
					<div class="header_bottom_left">				
						<div class="categories">
							<h3>商品分类</h3>
						   <ul id="classifymenu" onmouseenter="addclassify()" >
							   <?php if(is_array($typedata)): $i = 0; $__LIST__ = $typedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onmouseenter="showclassify(this)"   classifyid="<?php echo ($vo["type_id"]); ?>"><a href="#" ><?php echo ($vo["type_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						  	 </ul>
						</div>					
		  	         </div>
						    <div class="header_bottom_right">
								<div class="classifyMenu">
									<ul id="menulist">

									</ul>
								</div>
						 	    <!------ Slider ------------>
								  <div class="slider">
							      	<div class="slider-wrapper theme-default">
							            <div id="slider" class="nivoSlider">
							                <img src="/mall/Public/UserInterface/images/lunbo3.jpg" data-thumb="images/1.jpg"  alt="" />
							                <img src="/mall/Public/UserInterface/images/lunbo4.jpg" data-thumb="images/2.jpg" alt="" />
							                <img src="/mall/Public/UserInterface/images/lunbo5.jpg" data-thumb="images/3.jpg" alt="" />
							                <img src="/mall/Public/UserInterface/images/lunbo6.jpg" data-thumb="images/4.jpg" alt="" />
							                 <img src="/mall/Public/UserInterface/images/lunbo7.jpg" data-thumb="images/5.jpg" alt="" />
							            </div>
							        </div>
						   		</div>
						<!------End Slider ------------>
			         </div>
			     <div class="clear"></div>
			</div>
   		</div>
   </div>
   <!------------End Header ------------>
  <div class="main">
  	<div class="wrap">
      <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>强烈推荐</h3>
    		</div>
    	</div>
	      <div class="section group">
			  <?php if(is_array($redata)): $i = 0; $__LIST__ = $redata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="grid_1_of_5 images_1_of_5">
					 <a href="preview?pid=<?php echo ($vo["productid"]); ?>"><img src="/mall/<?php echo ($vo["product_img"]); ?>" alt="" width="200" height="110"/></a>
					 <h2><a href="preview?pid=<?php echo ($vo["productid"]); ?>"><?php echo ($vo["product_name"]); ?></a></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">￥<?php echo ($vo["product_price"]); ?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview?pid=<?php echo ($vo["productid"]); ?>">查看详情</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>					 
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>其他产品</h3>
    		</div>
    	  </div>
			<div class="section group">
				<?php if(is_array($noredata)): $i = 0; $__LIST__ = $noredata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="grid_1_of_5 images_1_of_5">
					 <a href="preview?pid=<?php echo ($vo["productid"]); ?>"><img src="/mall/<?php echo ($vo["product_img"]); ?>"  width="200" height="110" alt="" /></a>
					 <h2><a href="preview?pid=<?php echo ($vo["productid"]); ?>"><?php echo ($vo["product_name"]); ?></a></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">￥<?php echo ($vo["product_price"]); ?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview?pid=<?php echo ($vo["productid"]); ?>">查看详情</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
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
</html>
<script>
    function showclassify(op) {
        createObj();
        var pid=op.getAttribute("classifyid");
        // alert(pid);
        xmlhttp.open("get","classifyMenu?classifyid="+pid,true);
        xmlhttp.onreadystatechange=jiaowo;//这里为什么不写括号
        xmlhttp.send();
    }
    function addclassify() {
        var classifymenu =  document.getElementsByClassName("classifyMenu");
        classifymenu[0].style.display='block';
        // classifymenu[0].classList.remove("classifyMenu");
        // classifymenu[0].classList.remove("nodisplay");
    }
    function removeclassify() {
        var classifymenu =  document.getElementsByClassName("classifyMenu");
        classifymenu[0].style.display='none';
        // classifymenu[0].classList.add("nodisplay");
    }
    function jiaowo() {
        if (xmlhttp.readyState==4&&xmlhttp.status==200){
            var result=xmlhttp.responseText;
            var dataarray=JSON.parse(result);
            var menulist=document.getElementById("menulist");
            menulist.innerHTML="";

            // if (menulist.childNodes!==null){
            //     menulist.removeChild("li");
            // }
            // else {
                for(i=0;i<dataarray.length;i++){
                    var op = document.createElement("li");
                    var aproduct = document.createElement("a");
                    var img = document.createElement("img");
                    var block = document.createElement("div");
                    var text = document.createElement('div');

                    op.className='menuli';
                    img.setAttribute('src','/mall/'+dataarray[i].product_img);
                    img.setAttribute('width','150');
                    img.setAttribute('height','90');
                    block.classList.add("block");

                    menulist.appendChild(block);
                    block.appendChild(aproduct);
                    aproduct.appendChild(op);
                    op.appendChild(img);
                    op.appendChild(text);

                    text.innerText=dataarray[i].product_name;

                    aproduct.setAttribute('href','preview?pid='+dataarray[i].productid);
                }
            // }



        }
    }

    var xmlhttp;
    var opusername;
    function createObj() {
        if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }

</script>