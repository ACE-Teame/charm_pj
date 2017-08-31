<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar', $menu); ?>
		<div class="main fr">
			<h1>链接内容</h1>
			<div class="operate">
				<a href="<?php echo base_url('link/linkEdit')?>" class="btn add-link">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>
			<div class="search">
				<form action="<?php echo base_url('link/link') ?>" class="searchForm" method="GET" name="search" id="from">
					<!-- <div class="entry">
						<label>原链接:</label>
						<input type="text" name="link_id" placeholder="">
					</div> -->
					<div class="entry">
						<label>公司名称:</label>
						<input type="text" name="company_name" placeholder="">
					</div>		
					<div class="entry">
						<label>负责人:</label>
						<select name="user_id" id="">
								<option value="">请选择</option>
							<?php foreach ($userData as $key => $user): ?>
								<option value="<?=$user['id']?>"><?=$user['name']?></option>
							<?php endforeach ?>
						</select>
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
							<th class="tb-register-time">新建时间</th>
							<th class="tb-modify-time">修改时间</th>
							<th>负责人</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($linkContentData as $key => $linkContent): ?>
						<tr>
							<td><?=$linkContent['id']?></td>
							<td>
								<a href="#" class="original-link">
								<?php 
									if(empty($linkContent['url'])) {
										echo $model->select('domain', 'url', ['id' => $linkContent['domain_id']])[0];
									}else {
										echo $linkContent['url'];
									}
								 ?>
								<?php if ($linkContent['orginal_link']): ?>
									<?php echo '/' . $linkContent['orginal_link']; ?>
								<?php endif ?>
								</a>
							</td>
							<td><?=$linkContent['company_name']?></td>
							<td class="tb-register-time"><?=get_date($linkContent['create_time'])?></td>
							<td class="tb-modify-time"><?=get_date($linkContent['update_time'])?></td>
							<td>
							<?php 
								if(empty($linkContent['name'])) {
									echo $model->select('user', 'name', ['id' => $linkContent['leading_uid']])[0];
								}else {
									echo $linkContent['name'];
								}
							 ?>
							</td>
							<td>
								<a href="<?php echo base_url('link/linkEdit') . '?id=' . $linkContent['id'] ?>" class="btn modify-link">修改</a>
								<a href="#" class="btn delete" onclick="delete_by_id(<?=$linkContent['id']?>)">删除</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>

				<div class="paginate">
					<ul class="clear">
						<?php if ($count > $pageNum): ?>
							<?=$pageList?>
						<?php endif ?>
					</ul>
				</div>
			</div> <!-- end table -->
		</div><!-- end main -->
	</div><!-- end container -->
	<script>
		/**
		 * 根据ID删除数据
		 */
		function delete_by_id(id)
		{
			if(confirm('确定删除？') == true){
				$.post("<?php echo base_url('link/del_link_content'); ?>", {id: id}, function(data) {
					if(data.status == 200) {
						alert('删除成功');
					}else {
						alert('删除失败');
					}
					window.location.href = "<?php echo base_url('link/link')?>";
				}, 'JSON');
			}
		}

	</script>

<?php view('footer'); ?>
	
