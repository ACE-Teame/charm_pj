<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar', $menu); ?>
		<div class="main fr">
			<h1>链接跳转</h1>
			<div class="operate">
				<a href="<?php //echo base_url('skip/skipEdit')?>" class="btn add">新增</a>
				<a href="javascript:document.search.submit()" class="btn search">查询</a>
			</div>

			<div class="search">
				<form action="<?=base_url('link/skip')?>" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>原链接:</label>
						<input type="text" name="orginal_link" placeholder="">
					</div>
					<div class="entry">
						<label>审核链接:</label>
						<input type="text" name="audit_link" placeholder="">
					</div>	
					<div class="entry">
						<label>推广链接:</label>
						<input type="text" name="referral_link" placeholder="">
					</div>	
					<div class="entry">
						<label>负责人:</label>
						<select name="leading_uid" >
						<option value="">请选择</option>
						<?php foreach ($userData as $key => $user): ?>
							<option value ="<?=$user['id']?>"><?=$user['name']?></option>
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
							<th>域名</th>
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
							<td><a href="#" class="original-link"><?=$link['domain']?></a></td>
							<td><a href="#" class="original-link"><?=$link['orginal_link']?></a></td>
							<td><a href="#" class="verify-link"><?=$link['audit_link']?></a></td>
							<td><a href="#" class="spread-link"><?=$link['referral_link']?></a></td>
							<td class="tb-modify-time"><?=get_date($link['last_edit_time'])?></td>
							<td class="tb-modify-user"><?=$link['leadName']?></td>
							<td class="tb-address"><?=$link['addressName']?></td>
							<td>
								<a href="#" class="btn modify" onclick="link_edit(<?=$link['id']?>)" >修改</a>
								<a href="#" class="btn delete" onclick="delete_by_id(<?=$link['id']?>)">删除</a>
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
				<form action="<?=base_url('link/add')?>" class="operateForm" method="POST" name="addlink" id="from">
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
					<div class="entry">
						<label>是否生效</label>
						<input name="is_pass" id="is_pass" type="checkbox" value="1" />
					</div>	
				</form>
			</div>
			<div class="operate">
				<a href="javascript:document.addlink.submit();" class="btn save">保存</a>
				<a href="#" class="btn cancle" onclick="cancel()">取消</a>
			</div>			
			<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close" onclick="cancel()"></i></a></div> 
		</div>
		<script>

			/**
			 * 修改时获取数据
			 */
			function link_edit(id)
			{
				$.get('<?=base_url('link/get_by_pk')?>',{id:id}, function(data) {
					if(data != 0) {
						$("input[name='address_id[]']").each(function() {
							var v   = $(this).val();
							var obj = $(this);

							$.each(data.linkAddData, function(n, val) {
								if(v == val) {
									obj.attr('checked', true);
								}
							});
						});
						$('#orginal_link').val(data.linkData.orginal_link);
						$('#audit_link').val(data.linkData.audit_link);
						$('#referral_link').val(data.linkData.referral_link);
						$('#id').val(data.linkData.id);
						$("#domain_id").find("option[value='"+data.linkData.domain_id+"']").attr("selected",true);
						if(data.linkData.is_pass == 1) {
							$('#is_pass').attr('checked', 'checked');
						}else {
							$('#is_pass').removeAttr('checked');
						}
						$("#domain_id").find("option[value='"+data.linkData.domain_id+"']").attr("selected",true);
					}else {
						alert('数据错误');
					}
				}, 'JSON');
			}

			/**
			 * 取消 清空数据
			 */
			function cancel()
			{
				location.reload();
			}

			/**
			 * 根据ID删除数据
			 */
			function delete_by_id(id)
			{
				if(confirm('确定删除？') == true){
					$("#from").attr('action', '<?=base_url('link/del_skip')?>' + '?id=' + id);
					$("#from").submit();
				}
			}
		</script>
	</div><!-- end popup -->
<?php view('footer'); ?>
	
