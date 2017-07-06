<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>链接内容</h1>
			<div class="operate">
				<a href="link-edit" class="btn add-link">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>

			<div class="search">
				<form action="#" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>原链接:</label>
						<input type="text" name="link_id" placeholder="">
					</div>
					<div class="entry">
						<label>公司名称:</label>
						<input type="text" name="company_name" placeholder="">
					</div>		
					<div class="entry">
						<label>修改人:</label>
						<input type="text" name="user_id" placeholder="">
					</div>		
				</form>
			</div>

			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>原链接</th>
							<th>公司名称</th>
							<th>新建时间</th>
							<th>修改时间</th>
							<th>最后修改人</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><a href="#" class="original-link">1.php</a></td>
							<td>百度公司</td>
							<td>2017-05-16 11:55:44</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="link-edit.php" class="btn modify-link">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td><a href="#" class="original-link">2.php</a></td>
							<td>Google</td>
							<td>2017-05-16 11:55:44</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="link-edit.php" class="btn modify-link">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td><a href="#" class="original-link">3.php</a></td>
							<td>阿里巴巴</td>
							<td>2017-05-16 11:55:44</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>
								<a href="link-edit.php" class="btn modify-link">修改</a>
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


<?php view('footer'); ?>
	
