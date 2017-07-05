<?php require('header.php'); ?>
	<div class="container clear">
		<?php require('sidebar.php'); ?>
		<div class="main fr">
			<h1>链接跳转</h1>
			<div class="operate">
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>原链接</th>
							<th>审核链接</th>
							<th>推广链接</th>
							<th>最后修改时间</th>
							<th>最后修改人</th>
							<th>屏蔽地区</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>1.php</td>
							<td>http://www.baidu.com</td>
							<td>http://www.iconfont.cn</td>
							<td>2017-05-16 11:55:44</td>
							<td>admin</td>
							<td>北京</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>2.php</td>
							<td>http://www.baidu.com</td>
							<td>https://www.aliyun.com</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>上海，广州</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>3.php</td>
							<td>localhost/3.php</td>
							<td>https://www.aliyun.com</td>
							<td>2017-05-16 11:55:44</td>
							<td>John</td>
							<td>深圳</td>
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
			<div class="title">新增</div>
			<div class="form">						
				<form action="#" class="operateForm" method="POST" name="form1">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>原链接:</label>
						<input type="text" name="link_id" id="link_id" value="" placeholder="http://">
					</div>
					<div class="entry">
						<label>审核链接</label>
						<input type="text" name="verify_link" id="verify_link" value="" placeholder="http://">
					</div>
					<div class="entry">
						<label>推广链接:</label>
						<input type="text" name="spread_link" id="spread_link" value="" placeholder="http://">
					</div>
					<div class="entry">
						<label>屏蔽地区:</label>
						<select name="address" id="address" multiple>
							<option value ="北京" selected>北京</option>
							<option value ="上海">上海</option>
							<option value ="深圳">深圳</option>
							<option value ="武汉">武汉</option>
							<option value ="厦门">厦门</option>
							<option value ="广州">广州</option>
							<option value ="武汉">武汉</option>
							<option value ="杭州">杭州</option>
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
	
