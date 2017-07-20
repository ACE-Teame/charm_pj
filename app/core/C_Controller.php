<?php 
namespace app\core;
use system\core\Controller;
// use system\core\Session;
/**
 * 公共控制器
 */
class C_Controller extends Controller
{
	public $_model;
	public function __construct() {
		if(empty($this->_model)) {
			$this->_model =& model();
		}
		session_start();
		if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
			redirect('common/login');
		}
	}

	// 组合查询数据到url
	public function getSearchParam() {
		$searchParam = '';
		foreach (get() as $key => $value) {
			if( $key == 'page' ) continue;
			if( !empty($value) ) $searchParam .= '&'. $key . '=' . $value;
		}

		return $searchParam;
	}
	
}

 ?>