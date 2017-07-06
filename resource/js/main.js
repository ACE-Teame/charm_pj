(function($){
	$(function(){
		 
        // get current sidebar menu-list 
        var str = window.location.pathname;
        var i = str.lastIndexOf('/');
        var j = str.lastIndexOf('.');
        var ret = str.substring(i + 1, j);
        $('#' + ret).addClass('active');
        if(ret == 'link-edit'){
            $('#link').addClass('active');
        }

        $('body').on('click', '.modify', function(){
            $('.popup').addClass('active');
            return false;
        });
        $('body').on('click', '.add', function(){
            $('.popup').addClass('active');
            return false;
        });
        $('body').on('click', '.popup .close', function(){
            $('.popup').removeClass('active');
            return false;
        });
        $('body').on('click', '.popup .cancle', function(){
            $('.popup').removeClass('active');
            return false;
        });

        // 链接内容 tab 改变
        $('body').on('click', '.page-header .nav li', function(){
            $('.page-header .nav li').removeClass('active');
            $(this).addClass('active');
            var key = $(this).attr("id");
            $(".tab-content .tab-pane").removeClass('active');            
            $("." + key).addClass('active');
            return false;
        });

        // 手机端 菜单
        $('body').on('click', '.nav-toggle .open', function(){
            $('.nav-toggle .close').addClass('active');
            $(this).removeClass('active');
            $('.menu').addClass('active');
            return false;
        });
        $('body').on('click', '.nav-toggle .close', function(){
            $('.nav-toggle .open').addClass('active');
            $(this).removeClass('active');
            $('.menu').removeClass('active');            
            return false;
        });
    });
})(jQuery);