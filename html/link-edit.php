<?php require('header.php'); ?>
	<div class="container clear">
		<?php require('sidebar.php'); ?>
		<div class="main fr">
			<h1>编辑链接内容</h1>

			
			<div class="page-header">
				<ul class="nav clear">
					<li class="active" id="tab-1"><a href="#">产品参数</a></li>
					<li id="tab-2"><a href="#">产品主图</a></li>
					<li id="tab-3"><a href="#">购买流程</a></li>
					<li id="tab-4"><a href="#">产品简介</a></li>
					<li id="tab-5"><a href="#">用户回复</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane tab-1 active">
					<form action="#" class="operateForm" method="POST" name="form1">
						<div class="entry clear">
							<input type="hidden" name="id" id="id" value="">
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>是否属于订单类页面:</label>
							</div>
							<div class="fl">
								<input name="display_page" id="display_page"  type="checkbox" value="" />
								(当不选中时,页面是显示产品简介的内容)
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>链接名称:</label>
							</div>
							<div class="fl">
								<input type="text" name="link_name" id="link_name" value="" placeholder="">
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>标题:</label>
							</div>
							<div class="fl">
								<input type="text" name="title" id="title" value="" placeholder="">
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>价格:</label>
							</div>
							<div class="fl">
								<input type="text" name="price" id="price" value="" placeholder="">
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>是否显示折扣、购买人数、结束时间:</label>
							</div>
							<div class="fl">
								<input name="display_time" id="display_time"  type="checkbox" value="" />
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>购买人数:</label>
							</div>
							<div class="fl">
								<input type="text" name="buy_count" id="buy_count" value="" placeholder="">
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>折扣:</label>
							</div>
							<div class="fl">
								<input type="text" name="discount" id="discount" value="" placeholder="">
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>结束时间:</label>
							</div>
							<div class="fl">
								<input type="text" name="end_time" id="end_time" value="" placeholder="">
							</div>
						</div>
						<div class="entry clear">
							<div class="fl">
								<label>公司名称:</label>
							</div>
							<div class="fl">
								<input type="text" name="company_name" id="company_name" value="" placeholder="">
							</div>
						</div>	
						<div class="entry clear">
							<div class="fl">
								<label>ICP:</label>
							</div>
							<div class="fl">
								<input type="text" name="icp" id="icp" value="" placeholder="">
							</div>
						</div>	
						<div class="entry clear">
							<div class="fl">
								<label>电话:</label>
							</div>
							<div class="fl">
								<input type="text" name="phone" id="phone" value="" placeholder="">
							</div>
						</div>	
						<div class="entry clear">
							<div class="fl">
								<label>微信号:</label>
							</div>
							<div class="fl">
								<input type="text" name="wechat" id="wechat" value="" placeholder="">
							</div>
						</div>	
					</form>
				</div>
				<div class="tab-pane tab-2">
					<form action="#" class="operateForm" method="POST" name="form1">
						<div class="entry">
							<div class="text">
								<p>必须选择一张图片</p>
							</div>
							<div>
								<script id="mainImg" name="main_image" type="text/plain">
							        这里写你的初始化内容
							    </script>								
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane tab-3">
					<form action="#" class="operateForm" method="POST" name="form1">
						<div class="entry">							
							<div class="text">
								<p>购买流程</p>
							</div>
							<div>
								<script id="process" name="process" type="text/plain">
							        这里写你的初始化内容
							    </script>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane tab-4">
					<form action="#" class="operateForm" method="POST" name="form1">
						<div class="entry">
							<div class="text">
								<p>产品简介</p>
							</div>
							<div>
								<script id="description" name="description" type="text/plain">
							        这里写你的初始化内容
							    </script>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane tab-5">
					<form action="#" class="operateForm" method="POST" name="form1">
						<div class="entry">
							<div class="text">
								<p>客户留言</p>
							</div>
							<div>
								<script id="reply" name="reply" type="text/plain">
							        这里写你的初始化内容
							    </script>	
							</div>
						</div>
					</form>
				</div>

				<div class="operate">
					<a href="#" class="btn save">保存</a>
					<a href="#" class="btn cancle">取消</a>
				</div>
			</div>

		</div><!-- end main -->
	</div><!-- end container -->

    <!-- 加载编辑器的容器 -->
    <script type="text/javascript" src="js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="js/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var mainImg = UE.getEditor('mainImg'); // 主图
        var proc = UE.getEditor('process'); // 购买流程
        var desc = UE.getEditor('description'); // 产品描述
        var reply = UE.getEditor('reply'); // 客户留言
    </script>
<?php require('footer.php'); ?>
	
