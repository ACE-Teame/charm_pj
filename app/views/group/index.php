<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>权限管理</h1>
			<div class="operate">
				<a href="#" class="btn add">新增</a>
			</div>

			<div class="table">
				<table>
					<thead>
						<tr>
							<th>序号</th>
							<th>组名</th>
							<th>描述</th>
							<th>新建时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($groupData as $key => $group): ?>
						<tr>
							<td><?=$group['id']?></td>
							<td><?=$group['name']?></td>
							<td><?=$group['discription']?></td>
							<td><?=get_date($group['create_time'])?></td>
							<td>
								<a href="javascript:;" class="btn modify" onclick="group_edit(<?=$group['id']?>)">修改</a>
								<a href="javascript:;" class="btn delete" onclick="delete_by_id(<?=$group['id']?>)">删除</a>
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
				<form action="<?=base_url('group/add')?>" class="operateForm" method="POST" id="from" name="groupadd">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>组名:</label>
						<input type="text" name="name" id="name" value="" placeholder="">
					</div>
					<div class="entry">
						<label>描述:</label>
						<input type="text" name="discription" id="discription" value="" placeholder="">
					</div>
				</form>
			</div>
			<div class="operate">
				<a href="javascript:document.groupadd.submit();" class="btn save">保存</a>
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
				$.get('<?=base_url('group/get_by_pk')?>',{id:id}, function(data) {
					if(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#discription").val(data.discription);
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
				$("#discription").val('');
			}

			/**
			 * 根据ID删除数据
			 */
			function delete_by_id(id)
			{
				if(confirm('确定删除？') == true){
					$("#from").attr('action', '<?=base_url('group/delete_by_id')?>' + '?id=' + id);
					$("#from").submit();
				}
			}
		</script>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
