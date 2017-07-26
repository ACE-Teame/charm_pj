<?php view('header'); ?>
	<div class="container clear">
		<?php view('sidebar'); ?>
		<div class="main fr">
			<h1>编辑链接内容</h1>

			
			<div class="page-header">
				<ul class="nav clear">
					<li class="active" id="tab-1"><a href="#">产品参数</a></li>
					<li id="tab-2"><a href="#">产品主图</a></li>
					<li id="tab-3"><a href="#">购买流程</a></li>
					<li id="tab-4"><a href="#">产品简介</a></li>
					<li id="tab-5"><a href="#">用户回复</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<form action="#" class="operateForm" method="POST" name="form" id="formlink">
					<div class="tab-pane tab-1 active">
						
							<div class="entry clear">
								<input type="hidden" name="id" id="id" value="">
							</div>
							<div class="entry clear" id="domaindiv">
								<div class="fl">
									<label>域名:</label>
								</div>
								<div class="fl">
									<select name="domain_id" id="domain_id" onchange="change_domain(this)">
										<option value="">请选择</option>
									<?php foreach ($domainData as $key => $domain): ?>
										<option value="<?=$domain['id']?>"><?=$domain['domain']?></option>
									<?php endforeach ?>
									</select>
								</div><br>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>是否属于订单类页面:</label>
								</div>
								<div class="fl">
									<input name="display_page" id="display_page"  type="checkbox" value="" />
									(当不选中时,页面是显示产品简介的内容)
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>链接名称:</label>
								</div>
								<div class="fl">
									<input type="text" name="link_name" id="link_name" value="" placeholder="">
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>标题:</label>
								</div>
								<div class="fl">
									<input type="text" name="title" id="title" value="" placeholder="">
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>价格:</label>
								</div>
								<div class="fl">
									<input type="text" name="price" id="price" value="" placeholder="">
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>是否显示折扣、购买人数、结束时间:</label>
								</div>
								<div class="fl">
									<input name="is_show_time" id="is_show_time"  type="checkbox" value="" />
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>购买人数:</label>
								</div>
								<div class="fl">
									<input type="text" name="buy_count" id="buy_count" value="" placeholder="">
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>折扣:</label>
								</div>
								<div class="fl">
									<input type="text" name="discount" id="discount" value="" placeholder="">
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>结束时间:</label>
								</div>
								<div class="fl">
									<input type="text" name="end_time" id="end_time" value="" placeholder="">
								</div>
							</div>
							<div class="entry clear">
								<div class="fl">
									<label>公司名称:</label>
								</div>
								<div class="fl">
									<input type="text" name="company_name" id="company_name" value="" placeholder="">
								</div>
							</div>	
							<div class="entry clear">
								<div class="fl">
									<label>ICP:</label>
								</div>
								<div class="fl">
									<input type="text" name="icp" id="icp" value="" placeholder="">
								</div>
							</div>	
							<div class="entry clear">
								<div class="fl">
									<label>电话:</label>
								</div>
								<div class="fl">
									<input type="text" name="phone" id="phone" value="" placeholder="">
								</div>
							</div>	
							<div class="entry clear">
								<div class="fl">
									<label>微信号:</label>
								</div>
								<div class="fl">
									<input type="text" name="wechat" id="wechat" value="" placeholder="">
								</div>
							</div>	
					</div>
					<div class="tab-pane tab-2">
							<div class="entry">
								<div class="text">
									<p>必须选择一张图片</p>
								</div>
								<div>
									<textarea id="mainImg" name="main_image" type="text/plain">
								    </textarea>							
								</div>
							</div>
					</div>
					<div class="tab-pane tab-3">
							<div class="entry">							
								<div class="text">
									<p>购买流程</p>
								</div>
								<div>
									<textarea id="process" name="process" type="text/plain">
								    </textarea>
								</div>
							</div>
					</div>
					<div class="tab-pane tab-4">
							<div class="entry">
								<div class="text">
									<p>产品简介</p>
								</div>
								<div>
									<textarea id="description" name="description" type="text/plain">
								    </textarea>
								</div>
							</div>
					</div>
					<div class="tab-pane tab-5">
							<div class="entry">
								<div class="text">
									<p>客户留言</p>
								</div>
								<div>
									<textarea id="reply" name="reply" type="text/plain">
								    </textarea>	
								</div>
							</div>
					</div>
				</form>
				<div class="operate">
					<a href="javascript:;" class="btn save" onclick="save()">保存</a>
					<a href="javascript:;" class="btn cancle">取消</a>
				</div>
			</div>

		</div><!-- end main -->
	</div><!-- end container -->

    <!-- 加载编辑器的容器 -->
    <?php echo js('ueditor/ueditor.config.js'); ?>
    <?php echo js('ueditor/ueditor.all.js'); ?>
    <script type="text/javascript">
		var mainImg = UE.getEditor('mainImg'); // 主图
		var proc    = UE.getEditor('process'); // 购买流程
		var desc    = UE.getEditor('description'); // 产品描述
		var reply   = UE.getEditor('reply'); // 客户留言

        /**
         * 选择域名取出子链接
         */
        function change_domain(it)
        {
        	var domain_id = $(it).val();
        	$.post('<?php echo base_url('link/by_domainid_get_pinfo')?>', {domain_id: domain_id}, function(data) {

        		if(data.status == 200) {
        			var html = '';
        			var msg  = data.msg;
        			if($("#domain_pid").length >= 1) {
        				html = '<option value="">请选择</option>';
        				$.each(msg, function(key, val) {
							html +=  '<option value="'+val.id+'">'+val.orginal_link+'</option>';
						});
        				$("#domain_pid").html(html);
        			}else {
        				var html = '<div class="entry clear" id="domaindiv">';
						html += '<div class="fl">';	
						html += '<label>链接名称:</label>';
						html += '</div>'
						html += '<div class="fl">';
						html += '<select name="domain_pid" id="domain_pid" onchange="change_pdomain(this)">';
						html += '<option value="">请选择</option>';
						$.each(msg, function(key, val) {
							html +=  '<option value="'+val.id+'">'+val.orginal_link+'</option>';
						});
						html += '</select></div></div>';
						$("#domain_id").parent().parent().after(html);
	        		}
        		}else {
        			alert('操作失败');
        		}
        		console.log(data);
        	}, 'JSON');
        }

        /**
         * 选择子链接取出负责人
         */
        function change_pdomain(it)
        {
        	$.post('<?php echo base_url('link/by_linkid_get_leader')?>', {link_id: $(it).val()}, function(data) {
        		if(data.status == 200) {

        			if($('#leader_name').length >= 1) {
        				$("#leader_name").val(data.msg);
        			}else {
        				var html = '';
		        		html += '<div class="entry clear">';
						html += '<div class="fl">';
						html += '<label>负责人:</label>';
						html += '</div>';
						html += '<div class="fl">';
						html += '<input type="text" name="leader_name" id="leader_name" value="'+data.msg+'" readonly="readonly">';
						html += '</div>';
						html += '</div>';
						$("#domain_pid").parent().parent().after(html);
        			}
        		}else {
        			alert('数据异常');
        		}
        	}, 'JSON');
        }

        /**
         * 保存
         */
        function save()
        {
        	$.ajax({
        		url: "<?php echo base_url('link/linkEdit')?>",
        		type: 'POST',
        		dataType: 'json',
        		data: $('#formlink').serialize(),
        		success:function(data){
        			
        		},
        	})
        }
    </script>
<?php view('footer'); ?>
	
