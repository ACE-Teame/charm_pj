<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar', $menu); ?>
		<div class="main fr">
			<h1>域名</h1>
			<div class="operate">
				<a href="#" class="btn add">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>

			<div class="search">
				<form action="<?php echo base_url('domain');?>#" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>域名:</label>
						<input type="text" name="domain" placeholder="">
					</div>
					<div class="entry">
						<label>地址:</label>
						<input type="text" name="url" placeholder="">
					</div>				
				</form>
			</div>

			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>域名</th>
							<th>最后修改时间</th>
							<th>最后修改人</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($domainData as $key => $domain): ?>
							<tr>
								<td><?=$domain['id']?></td>
								<td><?=$domain['domain'] . '：'?><a href="http://<?=$domain['url']?>" class="original-link" target='_blank'><?=$domain['url']?></a></td>
								<td><?=get_date($domain['create_time'])?></td>
								<td><?=$domain['createName']?></td>
								<td>
									<a href="#" class="btn modify" onclick="group_edit(<?=$domain['id']?>)">修改</a>
									<a href="#" class="btn delete" onclick="delete_by_id(<?=$domain['id']?>)">删除</a>
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

	<div class="popup">
		<div class="content">
			<div class="title"><i class="iconfont icon-modify"></i> 编辑</div>
			<div class="form">						
				<form action="<?php echo base_url('domain/add')?>" class="operateForm" id="from" method="POST" name="add_from" id="add_from">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>域名:</label>
						<input type="text" name="domain" id="domain" value="" placeholder="">
					</div>
					<div class="entry">
						<label>地址</label>
						<input type="text" name="url" id="url" value="" placeholder="">
					</div>
				</form>
			</div>
			<div class="operate">
				<a href="javascript:document.add_from.submit();" class="btn save">保存</a>
				<a href="#" class="btn cancle" onclick="cancel()">取消</a>
			</div>			
			<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close" onclick="cancel()"></i></a></div> 
		</div>

		<script>

			/**
			 * 修改时获取数据
			 */
			function group_edit(id)
			{
				$.get('<?=base_url('domain/get_by_pk')?>',{id:id}, function(data) {
					if(data) {
						$("#id").val(data.id);
						$("#domain").val(data.domain);
						$("#url").val(data.url);
					}
				}, 'JSON');
			}

			/**
			 * 根据ID删除数据
			 */
			function delete_by_id(id)
			{
				if(confirm('确定删除？') == true){
					$("#from").attr('action', '<?=base_url('domain/delete_by_id')?>' + '?id=' + id);
					$("#from").submit();
				}
			}
		</script>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
