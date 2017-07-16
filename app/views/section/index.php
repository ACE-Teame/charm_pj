<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>部门</h1>
			<div class="operate">
				<a href="javascript:;" class="btn add" >新增</a>
			</div>
			<div class="table">
				<form action="" method="GET" name="section">
					<table>
						<thead>
							<tr>
								<th>序号</th>
								<th>部门名</th>
								<th>最后修改时间</th>
								<th>最后修改人</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($sectionData as $key => $section): ?>
							<tr>
								<td><?=$section['id']?></td>
								<td><?=$section['name']?></td>
								<td><?=get_date($section['last_edit_time'])?></td>
								<td>1</td>
								<td>
									<a href="#" class="btn modify" onclick="group_edit(<?=$section['id']?>)">修改</a>
									<a href="#" class="btn delete" onclick="delete_by_id(<?=$section['id']?>)">删除</a>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</form>
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
				<form action="<?php echo base_url('section/add')?>" class="operateForm" id="from" method="POST" name="add_from" id="add_from">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>部门名:</label>
						<input type="text" name="name" id="name" value="" placeholder="">
					</div>
				</form>
			</div>
			<div class="operate">
				<a href="javascript:document.add_from.submit();" class="btn save">保存</a>
				<a href="#" class="btn cancle" onclick="cancel()">取消</a>
			</div>			
			<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close" onclick="cancel()"></i></a></div>
			<script>

			/**
			 * 修改时获取数据
			 */
			function group_edit(id)
			{
				$.get('<?=base_url('section/get_by_pk')?>',{id:id}, function(data) {
					if(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
					}
				}, 'JSON');
			}

			/**
			 * 取消 清空数据
			 */
			function cancel()
			{
				$("#id").val('');
				$("#name").val('');
			}

			/**
			 * 根据ID删除数据
			 */
			function delete_by_id(id)
			{
				if(confirm('确定删除？') == true){
					$("#from").attr('action', '<?=base_url('section/delete_by_id')?>' + '?id=' + id);
					$("#from").submit();
				}
			}
		</script>
		</div>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
