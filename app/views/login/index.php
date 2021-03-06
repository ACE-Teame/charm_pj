<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>链接管理系统</title>
	<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_9ij1lw95ihnqm2t9.css">
	<?php echo css('main.css');?>
</head>
<body class="login">
	<div class="container">
		<div class="form">
			<div class="title">链接管理系统</div>
			<form action="<?php echo base_url('Common/login') ?>" class="operateForm" method="POST" name="form1" id="login">
				<div class="entry clear">
					<div class="fl">					
						<label>用户名:</label>
					</div>
					<div class="fl">					
						<input type="text" name="name" id="name" value="" placeholder="">
					</div>
				</div>
				<div class="entry clear">
					<div class="fl">					
						<label>密码:</label>
					</div>
					<div class="fl">					
						<input type="password" name="pwd" id="pwd" value="" placeholder="">
					</div>					
				</div>
<!-- 				<div class="entry clear">
					<div class="fl">					
						<label>验证码:</label>
					</div>
					<div class="fl">					
						<input type="text" name="inputCode" id="inputCode" value="" placeholder="" maxlength="6">
					</div>	
				</div>
				<div class="entry clear">
					<div class="fl">					
						<div class="code" id="checkCode" ></div>
					</div>
					<div class="fl">					
						<a href="#" class="reload-code">看不清换一张</a>	
					</div>
				</div> -->
				<div class="entry clear">
					<div id="validate-slider">
					    <div id="slider_bg"></div>
					    <span id="label">>></span>
					    <span id="labelTip">拖动滑块验证</span>
					</div>
				</div>
			</form>
			<a href="#" class="submit" >login</a>
		</div>
	</div>
	<?php echo js('jquery.min.js'); ?>
	<?php echo js('jquery.slideunlock.js'); ?>
	<script type="text/javascript">
		// 数字验证码
        // var code;
        // function createCode() {
        //     code = "";
        //     var codeLength = 6; //验证码的长度
        //     var checkCode = document.getElementById("checkCode");
        //     var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 
        //     'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        //     'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'); //所有候选组成验证码的字符，当然也可以用中文的
        //     for (var i = 0; i < codeLength; i++) {
        //         var charNum = Math.floor(Math.random() * 52);
        //         code += codeChars[charNum];
        //     }
        //     if (checkCode) {
        //         checkCode.className = "code";
        //         checkCode.innerHTML = code;
        //     }
        // }
        // function validateCode() {
        //     var inputCode = document.getElementById("inputCode").value;
        //     if (inputCode.length <= 0) {
        //         alert("请输入验证码！");
        //     }
        //     else if (inputCode.toUpperCase() != code.toUpperCase()) {
        //         alert("验证码输入有误！");
        //         createCode();
        //     }
        //     else {
        //     	$("#login").submit();
        //     }        
        // }  

		(function($){
			$(function(){
				$('body.login').on('click', '.submit', function(){
					var username = $('#name').val(),
						password = $('#pwd').val();
					if(username == ''){
						alert("请输入用户名！");
		           		return false;
					}
					if(password == ''){
						alert("请输入密码！");
		           		return false;
					}
		            if($('#validate-slider').hasClass('active')){
		            	$("#login").submit();
		            }else{
		            	alert("请拖动滑块验证！");
		            	return false;
		            }
		        });
		        // $('body.login').on('click', '.submit', function(){
		        //     validateCode();
		        //     return false;
		        // });
		        // $('body.login').on('click', '.code', function(){
		        //     createCode();
		        //     return false;
		        // });
		        // $('body.login').on('click', '.reload-code', function(){
		        //     createCode();
		        //     return false;
		        // });

				var slider = new SliderUnlock("#validate-slider",{
						successLabelTip : "欢迎访问"	
					},function(){
						$('#validate-slider').addClass('active');
						// alert("验证成功");
		            	// window.location.href="http://www.sucaijiayuan.com"
		        	});
		        slider.init();

			});
		})(jQuery);


	</script>
</body>
</html>