<?php 
namespace system\core;

use system\core\Config;
use system\core\lib\Medoo;

/**
 * 模型类
 * date(2017.6.18)
 */
class Model extends Medoo
{
	public $_model; 
	public function __construct()
	{
		$arrDbMsg = Config::getAll('database');
		parent::__construct($arrDbMsg);
		if(empty($this->_model)) {
			$this->_model = new Medoo();
		}
	}
}

