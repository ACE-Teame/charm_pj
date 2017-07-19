<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>链接跳转</h1>
			<div class="operate">
				<a href="<?php echo base_url('skip/skipEdit')?>" class="btn add">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>

			<div class="search">
				<form action="#" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>原链接:</label>
						<input type="text" name="link_id" placeholder="">
					</div>
					<div class="entry">
						<label>审核链接:</label>
						<input type="text" name="verify_link" placeholder="">
					</div>	
					<div class="entry">
						<label>推广链接:</label>
						<input type="text" name="spread_link" placeholder="">
					</div>	
					<div class="entry">
						<label>负责人:</label>
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
							<th>审核链接</th>
							<th>推广链接</th>
							<th class="tb-modify-time">最后修改时间</th>
							<th class="tb-modify-user">负责人</th>
							<th class="tb-address">屏蔽地区</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><a href="#" class="original-link">1.php</a></td>
							<td><a href="#" class="verify-link">http://www.baidu.com</a></td>
							<td><a href="#" class="spread-link">http://www.iconfont.cn</a></td>
							<td class="tb-modify-time">2017-05-16 11:55:44</td>
							<td class="tb-modify-user">admin</td>
							<td class="tb-address">北京</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td><a href="#" class="original-link">2.php</a></td>
							<td><a href="#"  class="verify-link">http://www.baidu.com</a></td>
							<td><a href="#" class="spread-link">https://www.aliyun.com</a></td>
							<td class="tb-modify-time">2017-05-16 11:55:44</td>
							<td class="tb-modify-user">John</td>
							<td class="tb-address">上海，广州</td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td><a href="#" class="original-link">3.php</a></td>
							<td><a href="#"  class="verify-link">localhost/3.php</a></td>
							<td><a href="#" class="spread-link">https://www.aliyun.com</a></td>
							<td class="tb-modify-time">2017-05-16 11:55:44</td>
							<td class="tb-modify-user">John</td>
							<td class="tb-address">深圳</td>
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
						<div class="address-box">							
							<input name="address" type="checkbox" value="1" />北京 
							<input name="address" type="checkbox" value="2" />深圳 
							<input name="address" type="checkbox" value="3" />广州 
							<input name="address" type="checkbox" value="4" />上海 
							<input name="address" type="checkbox" value="5" />武汉 
						</div>
<!-- 						<select name="address" id="address" multiple>
							<option value ="北京" selected>北京</option>
							<option value ="上海">上海</option>
							<option value ="深圳">深圳</option>
							<option value ="武汉">武汉</option>
							<option value ="厦门">厦门</option>
							<option value ="广州">广州</option>
							<option value ="武汉">武汉</option>
							<option value ="杭州">杭州</option>
						</select> -->

					</div>
					<div class="entry">
						<label>负责人:</label>
						<select name="user_id" id="user_id" >
						<option value ="1" selected>Nino</option>
							<option value ="2">Mike</option>
							<option value ="3">John</option>
							<option value ="4">Jenney</option>
							<option value ="5">Ivy</option>
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
<?php view('footer'); ?>
	
