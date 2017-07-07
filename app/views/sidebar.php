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
		<div class="name">John欢迎您</div>
		<div class="logout">
			<a href="#" class="btn btn-logout">退出</a>
		</div>
	</div>
	<div class="menu">
		<ul>
			<li>
				<div class="menu-title">账号管理</div>
				<ul>
					<li>
						<a href="<?php echo base_url('group/index')?>" id="group" class="menu-name"><i class="iconfont icon-user-group"></i>权限管理</a>
					</li>
					<li>
						<a href="<?php echo base_url('user/index')?>" id="user" class="menu-name"><i class="iconfont icon-user"></i>用户管理</a>
					</li>
				</ul>
			</li>
			<li>
				<div class="menu-title">链接跳转管理</div>
				<ul>
					<li>
						<a href="<?php echo base_url('link/skip')?>" id="skip" class="menu-name"><i class="iconfont icon-link"></i>链接跳转</a>
					</li>
				</ul>
			</li>
			<li>
				<div class="menu-title">链接内容管理</div>
				<ul>
					<li>
						<a href="<?php echo base_url('link/link')?>" id="link" class="menu-name"><i class="iconfont icon-product"></i>链接内容</a>
					</li>
				</ul>
			</li>
			<li>
				<div class="menu-title">地区管理</div>
				<ul>
					<li>
						<a href="<?php echo base_url('address/index')?>" id="address" class="menu-name"><i class="iconfont icon-address"></i>屏蔽地区</a>
					</li>
				</ul>
			</li>
			<li>
				<div class="menu-title">部门管理</div>
				<ul>
					<li>
						<a href="<?php echo base_url('sector/index')?>" id="sector" class="menu-name"><i class="iconfont icon-sector"></i>部门</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="copyright">
		<p>版权所有: 广州天拓网络技术有限公司深圳分公司</p>
	</div>
</div>