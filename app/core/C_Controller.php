<?php 
namespace app\core;
use system\core\Controller;

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
		
	}

	public function del_by_pk()
	{

	}
}

 ?>