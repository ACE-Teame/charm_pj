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
					<div id="drag"></div>
				</div>
			</form>
			<a href="#" class="submit" >login</a>
		</div>
	</div>
	<?php echo js('jquery.min.js'); ?>
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
		            if($('#drag').hasClass('active')){
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

			});
		})(jQuery);

		// 鼠标滑动验证码
		(function($){
		    $.fn.drag = function(options){
		        var x, drag = this, isMove = false, defaults = {
		        };
		        var options = $.extend(defaults, options);
		        //添加背景，文字，滑块
		        var html = '<div class="drag_bg"></div>'+
		                    '<div class="drag_text" onselectstart="return false;" unselectable="on">拖动滑块验证</div>'+
		                    '<div class="handler handler_bg"></div>';
		        this.append(html);
		         
		        var handler = drag.find('.handler');
		        var drag_bg = drag.find('.drag_bg');
		        var text = drag.find('.drag_text');
		        var maxWidth = drag.width() - handler.width();  //能滑动的最大间距
		         
		        //鼠标按下时候的x轴的位置
		        handler.mousedown(function(e){
		            isMove = true;
		            x = e.pageX - parseInt(handler.css('left'), 10);
		        });
		         
		        //鼠标指针在上下文移动时，移动距离大于0小于最大间距，滑块x轴位置等于鼠标移动距离
		        $(document).mousemove(function(e){
		            var _x = e.pageX - x;
		            if(isMove){
		                if(_x > 0 && _x <= maxWidth){
		                    handler.css({'left': _x});
		                    drag_bg.css({'width': _x});
		                }else if(_x > maxWidth){  //鼠标指针移动距离达到最大时清空事件
		                    dragOk();
		                }
		            }
		        }).mouseup(function(e){
		            isMove = false;
		            var _x = e.pageX - x;
		            if(_x < maxWidth){ //鼠标松开时，如果没有达到最大距离位置，滑块就返回初始位置
		                handler.css({'left': 0});
		                drag_bg.css({'width': 0});
		            }
		        });
		         
		        //清空事件
		        function dragOk(){
		            // console.log('验证通过');
		            handler.removeClass('handler_bg').addClass('handler_ok_bg');
		            $('#drag').addClass('active');
		            text.text('验证通过');
		            drag.css({'color': '#fff'});
		            handler.unbind('mousedown');
		            $(document).unbind('mousemove');
		            $(document).unbind('mouseup');
		        }
		    };
		    $('#drag').drag();
		})(jQuery);
	</script>
</body>
</html>