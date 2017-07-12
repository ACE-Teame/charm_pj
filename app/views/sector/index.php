<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>部门</h1>
			<div class="operate">
				<a href="<?=base_url('section/delete')?>" class="btn add">新增</a>
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
								<td><?=get_date($section['create_time'])?></td>
								<td>1</td>
								<td>
									<a href="#" class="btn modify">修改</a>
									<a href="#" class="btn delete" onclick="delete_by_id(<?php echo $section['id'] ?>, 'domain')">删除</a>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</form>
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
				<form action="<?php echo base_url('sector/add')?>" class="operateForm" method="GET" name="add_from" id="add_from">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>部门名:</label>
						<input type="text" name="name" id="address_name" value="" placeholder="">
					</div>
				</form>
			</div>
			<div class="operate">
				<a href="javascript:document.add_from.submit();" class="btn save">保存</a>
				<a href="#" class="btn cancle">取消</a>
			</div>			
			<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div>
			<script>
				function delete_by_id()
				{
					if(confirm('确认删除？') == true) {
						
					}
				}

			</script>
		</div>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
