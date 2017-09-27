<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	<title><?php echo $linkContData['title'] ?></title>
	<?php echo css('games/main.css'); ?>
</head>
<body>
	<div class="line"></div>
	<div class="container">
		<div class="top">
			<div class="adv clear">				
				<div class="img">
				<!-- 品牌logo 取出订单时购买流程的值 -->
				<?php echo strip_tags(htmlspecialchars_decode($linkContData['process']), '<img>') ?>
				<!-- <img src="<?php echo base_url('resource/images/games/logo.png') ?>" alt=""> -->
				</div>
				<div class="content">
					<div class="title"><?php echo $linkContData['title'] ?></div>
					<div class="img"><img src="<?php echo base_url('resource/images/games/start.png') ?>" alt=""></div>
					<!-- <div class="word">免费抢福利的斗地主</div> -->
				</div>
			</div>
			<div class="tip">
				<ul class="clear">
					<li>
						<img src="<?php echo base_url('resource/images/games/yes.png') ?>" alt="">
						<span>无病毒</span>
					</li>
					<li>
						<img src="<?php echo base_url('resource/images/games/yes.png') ?>" alt="">
						<span>无广告</span>
					</li>
					<li>
						<img src="<?php echo base_url('resource/images/games/yes.png') ?>" alt="">
						<span>隐私保护</span>
					</li>
					<li>
						<img src="<?php echo base_url('resource/images/games/yes.png') ?>" alt="">
						<span>官方正版</span>
					</li>
				</ul>
			</div>
		</div>		
		
		<div class="banner">
			<div class="gallery">		
				<!-- strip_tags去掉html标签 只保留img标签 需要更改请自行改之 -->	
				<ul class="silder clear">	
				<?php echo strip_tags(htmlspecialchars_decode($linkContData['main_image']), '<img>') ?>
				</ul>
			</div>
		</div>

		<div class="entry">
			<div class="title">软件介绍</div>
			<div class="content">
				<?php echo htmlspecialchars_decode($linkContData['description']) ?>
			</div>
			<!-- <div class="content">
				<p>移民APP手机客户端是一款全新专业的移民客户端，里面包括了世界各地的移民最新资讯，比如移民最新讯息、移民服务公司、移民国家等，让您可以第一时间全方位掌握你所需要的任何信息！</p>
			</div>
			<div class="content">	
				<p>* 游戏特色：</p>
				<p>版本 1.0.4中的新功能:</p>
				<p>1.项目详情增加了轮播图。</p>
				<p>2.常规修复</p>
			</div> -->
		</div>
		<footer>
			<p><?php echo $linkContData['company_name'] ?></p>
			<p><?php echo $linkContData['icp'] ?></p>
		</footer>
		<div class="menu">
			<a href="<?php echo strip_tags(htmlspecialchars_decode($linkContData['reply'])) ?>" class="btn">立即下载</a>
		</div>
	</div>
</body>
</html>