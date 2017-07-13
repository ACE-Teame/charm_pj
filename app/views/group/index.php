<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>权限管理</h1>
			<div class="operate">
				<a href="#" class="btn add" onclick="">新增</a>
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
								<a href="#" class="btn modify" onclick="group_edit(<?=$group['id']?>)">修改</a>
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
				<form action="<?=base_url('group/add')?>" class="operateForm" method="POST" name="groupadd">
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
			<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
		</div>

		<script>
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

			function cancel()
			{
				$("#id").val('');
			}
		</script>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
