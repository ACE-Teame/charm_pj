<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>用户管理</h1>
			<div class="operate">
				<a href="#" class="btn add">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>

			<div class="search">
				<form action="<?php echo base_url('user');?>#" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>用户名:</label>
						<input type="text" name="name" placeholder="">
					</div>
					<div class="entry">
						<label>部门:</label>
						<select name="section_id" >
						<option value="">请选择</option>
						<?php foreach ($sectionData as $key => $section): ?>
							<option value ="<?=$section['id']?>"><?=$section['name']?></option>
						<?php endforeach ?>
						</select> 
					</div>	
					<div class="entry">
						<label>组别:</label>
						<select name="group_id" >
						<option value="">请选择</option>
						<?php foreach ($groupData as $key => $group): ?>
							<option value ="<?=$group['id']?>"><?=$group['name']?></option>
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
							<th>用户名</th>
							<th class="tb-password">密码</th>
							<th>部门</th>
							<th class="tb-register-time">注册时间</th>
							<th>最近登录时间</th>
							<th class="tb-ip">最近登录IP</th>
							<th>组别</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($userData as $key => $user): ?>
						<tr>
							<td><?=$user['id']?></td>
							<td><?=$user['name']?></td>
							<td class="tb-password">***</td>
							<td><?=$user['sectionName']?></td>
							<td class="tb-register-time"><?=get_date($user['create_time'])?></td>
							<td><?=get_date($user['login_time'])?></td>
							<td class="tb-ip"><?=$user['ip']?></td>
							<td><?=$user['groupName']?></td>
							<td>
								<a href="javascript:;" class="btn modify" onclick="group_edit(<?=$user['id']?>)">修改</a>
								<a href="javascript:;" class="btn delete" onclick="delete_by_id(<?=$user['id']?>)">删除</a>
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
		</div>
	</div>

	<div class="popup">
		<div class="content">
			<div class="title"><i class="iconfont icon-modify"></i> 编辑</div>
			<div class="form">						
				<form action="<?=base_url('user/add')?>" class="operateForm" method="POST" id="from" name="adduser">
					<div class="entry">
						<input type="hidden" name="id" id="id" value="">
					</div>
					<div class="entry">
						<label>用户名:</label>
						<input type="text" name="name" id="name" value="" placeholder="">
					</div>
					<div class="entry">
						<label>密码:</label>
						<input type="password" name="pwd" id="pwd" value="" placeholder="">
					</div>
					<div class="entry">
						<label>确定密码:</label>
						<input type="password" name="pwd" id="pwd" value="" placeholder="">
					</div>
					<div class="entry">
						<label>部门:</label>
						<select name="section_id" id="section_id">
						<?php foreach ($sectionData as $key => $section): ?>
							<option value ="<?=$section['id']?>"><?=$section['name']?></option>
						<?php endforeach ?>
						</select>
					</div>
					<div class="entry">
						<label>组别:</label>
						<select name="group_id" id="group_id">
							<?php foreach ($groupData as $key => $group): ?>
								<option value ="<?=$group['id']?>"><?=$group['name']?></option>
							<?php endforeach ?>
							
							<!-- <option value ="2">会员</option> -->
						</select>
					</div>
				</form>
			</div>
			<div class="operate">
				<a href="javascript:document.adduser.submit();" class="btn save" >保存</a>
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
				$.get('<?=base_url('user/get_by_pk')?>',{id:id}, function(data) {
					if(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#section_id").find("option[value='"+data.section_id+"']").attr("selected",true);
						$("#group_id").find("option[value='"+data.group_id+"']").attr("selected",true);
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
				$("#section_id option").each(function() {
					$(this).attr('selected', false);
				});
				$("#group_id option").each(function() {
					$(this).attr('selected', false);
				});
			}

			/**
			 * 根据ID删除数据
			 */
			function delete_by_id(id)
			{
				if(confirm('确定删除？') == true){
					$("#from").attr('action', '<?=base_url('user/delete_by_id')?>' + '?id=' + id);
					$("#from").submit();
				}
			}
		</script>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
