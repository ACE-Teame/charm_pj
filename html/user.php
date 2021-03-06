<?php require('header.php'); ?>
	<div class="container clear">
		<?php require('sidebar.php'); ?>
		<div class="main fr">
			<h1>用户管理</h1>
			<div class="operate">
				<a href="#" class="btn add">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>

			<div class="search">
				<form action="#" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>用户名:</label>
						<input type="text" name="username" placeholder="">
					</div>
					<div class="entry">
						<label>部门:</label>
						<input type="text" name="sector_id" placeholder="">
					</div>	
					<div class="entry">
						<label>组别:</label>
						<input type="text" name="group_id" placeholder="">
					</div>				
				</form>
			</div>

			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>用户名</th>
							<th>密码</th>
							<th>部门</th>
							<th>注册时间</th>
							<th>最近登录时间</th>
							<th>最近登录IP</th>
							<th>组别</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>admin</td>
							<td>***</td>
							<td>KA</td>
							<td>2017-05-16 11:55:44</td>
							<td>2017-05-16 11:55:44</td>
							<td>168.192.1.1</td>
							<td>管理员</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>John</td>
							<td>***</td>
							<td>KA</td>
							<td>2017-05-16 11:55:44</td>
							<td>2017-05-16 11:55:44</td>
							<td>168.192.1.1</td>							
							<td>会员</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Mike</td>
							<td>***</td>
							<td>TSA</td>
							<td>2017-05-16 11:55:44</td>
							<td>2017-05-16 11:55:44</td>
							<td>168.192.1.1</td>
							<td>会员</td>
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
		</div>
	</div>

	<div class="popup">
		<div class="content">
			<div class="title"><i class="iconfont icon-modify"></i> 编辑</div>
			<div class="form">						
				<form action="#" class="operateForm" method="POST" name="form1">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>用户名:</label>
						<input type="text" name="username" id="username" value="" placeholder="">
					</div>
					<div class="entry">
						<label>密码:</label>
						<input type="password" name="password" id="password" value="" placeholder="">
					</div>
					<div class="entry">
						<label>确定密码:</label>
						<input type="password" name="password" id="password" value="" placeholder="">
					</div>
					<div class="entry">
						<label>部门:</label>
						<select name="sector_id" id="sector_id" multiple>
							<option value ="KA" selected>KA</option>
							<option value ="TSA">TSA</option>
							<option value ="微博">微博</option>
							<option value ="扶翼">扶翼</option>
							<option value ="陌陌">陌陌</option>
						</select>
					</div>
					<div class="entry">
						<label>组别:</label>
						<select name="group_id" id="group_id" multiple>
							<option value ="1" selected>管理员</option>
							<option value ="2">会员</option>
						</select>
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
	
