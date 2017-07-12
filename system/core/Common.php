<?php 
	/**
	 * 打印函数
	 * @param  array/string/int  $arr  打印变量
	 * @param  boolean 			 $flag 是否终止标识符
	 * @return string        
	 */
	function p($arr, $flag = TRUE) 
	{
		echo "<pre>";
		echo '========================开始========================';
		echo "</br>";
		if( $arr ){
			print_r($arr);
		} else {
			echo '此值为空';
		}
		echo "</br>";
		echo '========================结束========================';
		echo "</pre>";
		if($flag == FALSE) exit;
	}

	/**
	 * 获得当前项目的网址
	 * @param  string $uri uri
	 * @return string      url
	 */
	function base_url($uri = '') 
	{
		 if (isset($_SERVER['SCRIPT_NAME'][0])) {
		 	$urlFloder = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
		 	$url = $_SERVER['REQUEST_SCHEME'] . '://' .  $_SERVER['HTTP_HOST'] . $urlFloder;
		 	
		 	return rtrim($url, '/') . '/' .  $uri;
		 }
	}

	/**
	 * 上传图片处理
	 * @param  string $targetPath 相对路径
	 * @param  array $file_ext    允许上传文件后缀
	 * @return json(file_url完整路径;url相对路径 )  
	 * @author 命中水、 
	 * @date(2016-9-29 am)             
	 */
	function plupload($targetPath, $file_ext) {
		if(empty($targetPath) || empty($file_ext) || !is_array($file_ext)) {
			return '不是正确的文件类型';
		}
		$tempFile = $_FILES["file"]["tmp_name"];
		if (!file_exists($targetPath)) {
			@mkdir($targetPath);
	    	chmod($targetPath, 0777);
		}

		$file_name       = $_REQUEST['name'];
		$fileParts       = pathinfo($file_name);
		$date            = date('YmdHis', time());
		$upload_filename = $date.'_'.$file_name;
		$targetFile      = rtrim($targetPath,'/').'/'.$upload_filename;
		
		$targetFiles     = iconv("UTF-8", "GBK//IGNORE",$targetFile);
		$url             = base_url(substr($targetFile,1));
		if (in_array($fileParts['extension'],$file_ext)) {
			if(move_uploaded_file($tempFile,$targetFiles)){
				$file_message = array(
					'state'    => 1,
					'file_url' => $url,
					'url'      => substr($targetFile,1),
					'upload_filename' => $upload_filename
					);
				return json_encode($file_message);
			}else{
				$file_message = array(
					'state'    => 2,
					'msg'      => '啊哦！文件移动失败了,请检查文件路径',
					);
				return json_encode($file_message);
			}
		} else {
			echo '文件类型不匹配哈！';
			return FALSE;
		}
	}

	/**
	 * 根据绝对路径删除目录中文件
	 * @param  string $file_path 文件相对路径
	 * @return bool   
	 * @author 命中水、 
	 * @date(2016-10-9 pm)         
	 */
	function delete_file( $file_path ) {
		$file_path = get_absolute_path($file_path);
		if( unlink( $file_path ) ) return TRUE;
		return FALSE;	
		
	}

	/**
	 * 取得文件绝对路径
	 * @param  string $file_path 文件路径 
	 * 例：/uploads/business_code/20161104032818.jpg
	 * @return string            文件绝对路径
	 * 例：E:\WWW\lims_cy_new\web\uploads\business_code\20161104032818.jpg
	 * @author 命中水、 
	 * @date(2016-11-4 am)
	 */
	function get_absolute_path( $file_path ) {
		$file_path = str_replace('/', '\\', $file_path);
		$file_path = getcwd() . $file_path;  //转换绝对路径 
		$absolute_path = iconv("UTF-8", "GBK",$file_path);  //调整编码
		return $absolute_path;
	}



	/**
	 * 引用JS
	 * @param string $js JS文件
	 * @return string
	 */
	function js( $js , $js_path = 'js', $resource = 'resource') {
		$is_relative = ( strpos( $js, 'http' ) === FALSE );
		if ( $is_relative ) $js = base_url( $resource . '/' . $js_path . '/' . $js);
		return "<script type=\"text/javascript\" src=\"{$js}\"></script>";
	}

	/**
	 * 引用CSS
	 * @param string $css CSS文件
	 * @param string $theme 主题
	 * @return string
	 */
	function css( $css, $css_path = 'css', $resource = 'resource' ) {
		$is_relative = ( strpos( $css, 'http' ) === FALSE );
		// CSS
		// 当前主题
		if ( $is_relative ) {
			$css = base_url($resource . '/' . $css_path . '/' . $css);
		}
		return "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$css}\" media=\"all\" />";
	}

	/**
	 * 加载视图
	 * @param  string $file_path 文件路径
	 * @param  array  $data      值
	 */
	function view($file_path, $data = '') 
	{
		$file_path = VIEWS . $file_path . APPEXT;

		if(is_array($data)) extract($data);
		if(is_file($file_path)){
			include_once $file_path;
		} else {
			throw new \Exception("找不到视图文件 -- " . $file_path);
		}
	}

    /**
     * 获取post数据
     * @param  string $name post键
     * @return val/array    post值
     */
	function post($name = '')
	{
		$security = new \system\core\Security();
		if($name) {
			return $security->isEscape($_POST[$name]);
		}else {
			$arrPost = [];
			foreach ($_POST as $key => $value) {
				$arrPost[$key] = $security->isEscape($value);
			}
			return $arrPost;
		}
	}

	/**
     * 获取get数据
     * @param  string $name get键
     * @return val/array    get值
     */
	function get($name = '')
	{
		$security = new \system\core\Security();
		if($name) {
			return $security->isEscape($_GET[$name]);
		}else {
			$arrGET = [];
			foreach ($_GET as $key => $value) {
				$arrGET[$key] = $security->isEscape($value);
			}
			return $arrGET;
		}
	}

	function request($name = '', $type='get') {
		$type = $type ? $type : strtolower(trim($type));
		$arrData = [];
		switch ($type) {
			case 'get':
				$arrData = get($name);
				break;
			case 'post':
				$arrData = post($name);
				break;
			case 'request':
				$arrData = $_REQUEST;
				break;
			default:
				$arrData = FALSE;
				break;
		}

		return $arrData;
	}

	function get_date($time = ''){
		return $time ? date('Y-m-d H:i:s', $time) : date('Y-m-d H:i:s');
	}

