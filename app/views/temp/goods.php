<?php dump($linkContData) ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	<title><?php echo $linkContData['title'] ?></title>
	<?php echo css('goods/font/iconfont.css'); ?>
	<?php echo css('goods/main.css'); ?>
</head>
<body>
<div class="container">
	<h1><?php echo $linkContData['title'] ?></h1>
	<section class="main-pic">
		<!-- strip_tags去掉html标签 只保留img标签 需要更改请自行改之 -->
		<?php echo strip_tags(htmlspecialchars_decode($linkContData['main_image']), '<img>') ?>
	</section>
	<section class="banner">
		<div class="price">			
			<ul class="list clear">
				<li>￥<?php echo $linkContData['price'] * $linkContData['discount'] ?></li>
				<li>
					<div class="title">原价</div>
					<div class="number"><?php echo $linkContData['price'] ?></div>
				</li>
				<li>
					<div class="title">折扣</div>
					<div class="number"><?php echo $linkContData['discount'] ?>0</div>
				</li>
				<li>
					<div class="title">节省</div>
					<div class="number"><?php echo $linkContData['price'] - ($linkContData['price'] * $linkContData['discount']); ?></div>
				</li>
			</ul>

			<ul class="time clear">
				<li><?php echo $linkContData['buy_count'] ?>人已购买</li>
				<li>
					<span id="_d">00</span>天
				    <span id="_h">00</span>小时
				    <span id="_m">00</span>分
				    <span id="_s">00</span>秒
		        </li>
			</ul>
		</div>
		
		<div class="buy"><a class="btn" href="#order">立即购买</a></div>
	</section>
	<section>
		<h2>购买流程</h2>
		<div>
			<?php echo htmlspecialchars_decode($linkContData['process']) ?>
		</div>
	</section>
	<section>
		<h2>详细信息</h2>
		<div class="swrap">
			<!-- <ul class="item">		
				<li>显示方式: 指针式</li>
				<li>表盘厚度: 12mm</li>
				<li>表盘直径: 40mm</li>
				<li>上流行元素: 复古</li>
				<li>形状: 圆形</li>
				<li>表壳材质: 精钢</li>
				<li>颜色分类: 白面白壳皮带款 黑面白壳皮带款 白面咖壳皮带款 黑面咖壳皮带款 咖面咖色皮带款 白面白壳钢带款 黑面白壳钢带款 白面咖壳钢带款 黑面咖壳钢带款 咖面咖壳钢带款</li>
				<li>表底类型: 普通</li>
			</ul> -->
			<?php echo htmlspecialchars_decode($linkContData['description']) ?>

		</div>
		<!-- <div><img src="<?php echo base_url('resource/images/goods/2.jpg') ?>"></div>
		<div><img src="<?php echo base_url('resource/images/goods/3.jpg') ?>"></div>
		<div><img src="<?php echo base_url('resource/images/goods/4.jpg') ?>"></div> -->
	</section>

	<section class="order" id="order">
		<h2>订单信息</h2>
		<div class="content">
			<form>
				<div class="entry">
					<div class="left"><label><em>*</em>数量</label></div>
					<div class="right">
					<a id="plus" href="javascript:;">-</a>
					<input type="text" name="name" id="num" value="1" style="width: 50px;">
					<a id="add" href="javascript:;">+</a>
					</div>				
				</div>
				<div class="entry">
					<div class="left"><label><em>*</em>姓名</label></div>
					<div class="right"><input type="text" name="name"></div>					
				</div>
				<div class="entry">
					<div class="left"><label><em>*</em>手机</label></div>
					<div class="right"><input type="text" name="phone"></div>
				</div>
				<div class="entry">
					<div class="left"><label><em>*</em>地区</label></div>					
					<div class="right">
						<div data-toggle="distpicker">
							<select data-province="---- 选择省 ----"></select>
							<select data-city="---- 选择市 ----"></select>
							<select data-district="---- 选择区 ----"></select>
						</div>
					</div>
				</div>
				<div class="entry">
					<div class="left"><label><em>*</em>地址</label></div>					
					<div class="right"><input type="text" name="address"></div>
				</div>
				<div class="entry">
					<div class="left"><label><em>*</em>金额</label></div>					
					<div class="right"><input type="text" id="total" readonly value="" style="width: 100px;">元</div>
				</div>
				<div class="entry">
					<div class="left"><label><em>*</em>付款</label></div>					
					<div class="right"><input type="radio" checked value="货到付款"><img src="<?php echo base_url('resource/images/goods/hdfk.gif') ?>"></div>
				</div>
				<div class="entry">
					<div class="left"><label>留言</label></div>
					<div class="right"><textarea></textarea></div>
				</div>
			</form>
		</div>
		<div class="submit">
			<a class="btn" href="#">立即提交订单</a>
		</div>
		
	</section>
	<section>
		<div id="show">
			<ul id="demo1">
				<li>
					<span>[最新购买]：</span>周**（136****7163）在1分钟前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>李**（180****2588）在1天前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>林**（139****3562）在10小时前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>周**（137****3260）在15分钟前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>谭**（150****7858）在20小时前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>张**（135****3425）在43分钟前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>吴**（137****4125）在3分钟前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
				<li>
					<span>[最新购买]：</span>刘**（136****7125）在5小时前订购了 防水全自动机械表<font color="#FF0000">√</font>
				</li>
			</ul>
			<div id="demo2"></div>
		</div>
	</section>

	<footer>
		<div style="text-align: center"><img src="<?php echo base_url('resource/images/goods/foot.png') ?>"></div>
		<p><?php echo $linkContData['company_name'] ?></p>
		<p><?php echo $linkContData['icp'] ?></p>
	</footer>
	<nav>
		<ul class="menu clear">
			<li>
				<i class="iconfont icon-home"></i><a href="#order">在线下单</a>
			</li>
			<li>
				<i class="iconfont icon-phone"></i><a href="tel:#">电话咨询</a>
			</li>
		</ul>
	</nav>
</div>
<?php echo js('jquery.min.js'); ?>
<?php echo js('distpicker.js'); ?>
<script type="text/javascript">  
	function countTime() {  
		//获取当前时间  
		var date = new Date();  
		var now = date.getTime();  
		//设置截止时间  
		var endDate = new Date("<?php echo $linkContData['end_time'] ?>");  


		var end = endDate.getTime();  
		//时间差  
		var leftTime = end - now;  
		//定义变量 d,h,m,s保存倒计时的时间  
		var d, h, m, s;  
		if (leftTime >= 0) {  
			d = Math.floor(leftTime / 1000 / 60 / 60 / 24);  
			h = Math.floor(leftTime / 1000 / 60 / 60 % 24);  
			m = Math.floor(leftTime / 1000 / 60 % 60);  
			s = Math.floor(leftTime / 1000 % 60);                     
			//将倒计时赋值到div中  
			document.getElementById("_d").innerHTML = d;  
			document.getElementById("_h").innerHTML = h;  
			document.getElementById("_m").innerHTML = m;  
			document.getElementById("_s").innerHTML = s;  
		}else{
			document.getElementById("_d").innerHTML = 0;  
			document.getElementById("_h").innerHTML = 0;  
			document.getElementById("_m").innerHTML = 0;  
			document.getElementById("_s").innerHTML = 0;  
		}
		//递归每秒调用countTime方法，显示动态时间效果  
		setTimeout(countTime, 1000);    
	}

  	var speed = 140;
	window.onload = function(){
		var demo = document.getElementById("show"); 
		var demo2 = document.getElementById("demo2"); 
		var demo1 = document.getElementById("demo1"); 
		demo2.innerHTML = demo1.innerHTML 
		function Marquee(){ 
			if(demo.scrollTop >= demo1.offsetHeight){
				demo.scrollTop = 0; 
			}
			else{ 
			demo.scrollTop = demo.scrollTop + 1;
			} 
		} 
		var MyMar = setInterval(Marquee, speed);
		demo.onmouseover = function(){ clearInterval(MyMar); } 
		demo.onmouseout = function(){ MyMar = setInterval(Marquee, speed); } 
		countTime();
	}
</script>
<script type="text/javascript">
(function($){
	$(function(){
		var t = $("#num");  
	    $("#add").click(function(){       
	      t.val(parseInt(t.val()) + 1)  
	      setTotal();  
	    })  
	    $("#plus").click(function(){  
	    	if(t.val() != 0){
	      		t.val(parseInt(t.val()) - 1)  
	    	}
	      setTotal();  
	    })  
	  	function setTotal(){  
	  		var total = <?php echo $linkContData['price'] * $linkContData['discount'] ?>;
	  		if(t.val() < 0){
	  			$("#total").val(total);
	  		}else{
	      		$("#total").val((parseInt(t.val()) * total).toFixed(2));  
	  		}
	    }  
	    setTotal();  

	    $('body').on('click', '.submit .btn', function(){
	    	alert('提交成功');
	    	return false;
	    });
	});
})(jQuery);

</script>

</body>
</html>

