<?php 


// dump($menuData); ?>


<div class="sidebar fl">
	<div class="title">
		<!-- <img src="images/logo.png" alt="logo"> -->
		<a href="<?php echo base_url('index')?>">
			<i class="iconfont icon-system"></i>
			<span>链接管理系统</span>
		</a>
	</div>
	<div class="nav-toggle">
		<div>			
        	<a class="open active" href="#"><i class="iconfont icon-menu"></i></a>
		</div>
		<div>			
        	<a class="close" href="#"><i class="iconfont icon-close"></i></a>
		</div>
    </div>
	<div class="personInfo">
		<div class="name"><?php echo $_SESSION['name'] ?>欢迎您</div>
		<div class="logout">
			<a href="<?php echo base_url('common/logout') ?>" class="btn btn-logout" onClick="return confirm('确定退出？');">退出</a>
		</div>
	</div>
	<?php if ($menuData): ?>
	<div class="menu">
		<ul>
		<?php foreach ($menuData as $key => $menu): ?>
			<?php if ($menu && is_array($menu)): ?>
			<li>
				<div class="menu-title"><?=$menu['name']?></div>
				<ul>
				<?php foreach ($menu['son'] as $son): ?>
					<li>
						<a href="<?php echo base_url($son['url'])?>" id="<?=substr($son['class'], 5)?>" class="menu-name"><i class="iconfont <?=$son['class']?>"></i><?=$son['name']?></a>
					</li>
				<?php endforeach ?>
				</ul>
			</li>
			<?php endif ?>
		<?php endforeach ?>
		</ul>
	</div>
	<?php endif ?>
	<div class="copyright">
		<p>版权所有: 广州天拓网络技术有限公司深圳分公司</p>
	</div>
</div>