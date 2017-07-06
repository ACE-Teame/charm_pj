<?php require('header.php'); ?>
	<div class="container clear">
		<?php require('sidebar.php'); ?>
		<div class="main fr">
			<h1>屏蔽地区</h1>
			<div class="operate">
				<a href="#" class="btn add">新增</a>
			</div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>地区名</th>
							<th>最后修改时间</th>
							<th>最后修改人</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>北京</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>上海</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>深圳</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>广州</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>5</td>
							<td>武汉</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>6</td>
							<td>厦门</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>6</td>
							<td>杭州</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="paginate">
					<ul class="clear">
						<div id="page">
							<li><span>首页</span></li>
							<li><span>上一页</span></li>
							<li><a href="?page=1" title="第1页" class="active">1</a></li>
							<li><a href="?page=2" title="第2页">2</a></li>
							<li><a href="?page=2" title="下一页">下一页</a></li>
							<li><a href="?page=2" title="尾页">尾页</a></li>
							<p class="pageRemark">共<b> 2 </b>页<b> 16 </b>条数据</p>
						</div>
					</ul>
				</div>
			</div> <!-- end table -->
		</div><!-- end main -->
	</div><!-- end container -->

	<div class="popup">
		<div class="content">
			<div class="title"><i class="iconfont icon-modify"></i> 编辑</div>
			<div class="form">						
				<form action="#" class="operateForm" method="POST" name="form1">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>地区名:</label>
						<input type="text" name="address_name" id="address_name" value="" placeholder="">
					</div>
				</form>
			</div>
			<div class="operate">
				<a href="#" class="btn save">保存</a>
				<a href="#" class="btn cancle">取消</a>
			</div>			
			<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
		</div>
	</div><!-- end popup -->
<?php require('footer.php'); ?>
	
