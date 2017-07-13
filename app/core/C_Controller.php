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

	public function get_by_id($table, $id, $columns = '*')
	{

		if($id && $table) {

			if($columns != '*' && is_string($columns)) {
				$columns = explode(',', $columns);
			}
			if($columns || is_array($columns)){
				return $this->_model->select($table, $columns, [key($id) => end($id)]);
			}
		}
	}

	public function del_by_pk($table, $id)
	{
		if($id && $table) {
			return $this->_model->delete($table, [key($id) => end($id)]);
		}
	}
}

 ?>