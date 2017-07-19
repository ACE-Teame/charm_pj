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
					<?php foreach ($linkData as $key => $link): ?>
						<tr>
							<td><?=$link['id']?></td>
							<td><a href="#" class="original-link"><?=$link['orginal_link']?></a></td>
							<td><a href="#" class="verify-link"><?=$link['audit_link']?></a></td>
							<td><a href="#" class="spread-link"><?=$link['referral_link']?></a></td>
							<td class="tb-modify-time"><?=get_date($link['last_edit_time'])?></td>
							<td class="tb-modify-user"><?=$link['leadName']?></td>
							<td class="tb-address"><?=$link['addressName']?></td>
							<td>
								<a href="#" class="btn modify">修改</a>
								<a href="#" class="btn delete">删除</a>
							</td>
						</tr>
					<?php endforeach ?>
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
				<form action="<?=base_url('link/add')?>" class="operateForm" method="POST" name="form1">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>主域名:</label>
						<select name="domain_id" id="domain_id">
						<?php foreach ($domainData as $key => $domain): ?>
							<option value ="<?=$domain['id']?>"><?=$domain['domain']?></option>
						<?php endforeach ?>
						</select>
					</div>
					<div class="entry">
						<label>原链接:</label>
						<input type="text" name="orginal_link" id="orginal_link" value="" placeholder="http://">
					</div>
					<div class="entry">
						<label>审核链接</label>
						<input type="text" name="audit_link" id="audit_link" value="" placeholder="http://">
					</div>
					<div class="entry">
						<label>推广链接:</label>
						<input type="text" name="referral_link" id="referral_link" value="" placeholder="http://">
					</div>
					<div class="entry">
						<label>屏蔽地区:</label>
						<div class="address-box">
							<?php foreach ($addressData as $key => $address): ?>
								<input name="address_id[]" type="checkbox" value="<?=$address['id']?>" /><?=$address['name']?> 				
							<?php endforeach ?>
						</div>
					</div>
					<div class="entry">
						<label>负责人:</label>
						<select name="leading_uid" id="leading_uid" >
						<?php foreach ($userData as $key => $user): ?>
							<option value ="<?=$user['id']?>"><?=$user['name']?></option>
						<?php endforeach ?>
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
	
