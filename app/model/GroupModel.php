<?php 
namespace app\model;
use system\core\Model;

class GroupModel extends Model
{

	public function __construct()
	{
		parent::__construct();
		$this->pk = 'id';
	}
	// public static function getInfo()
	// {
	// 	return $this->select('group', '*');
	// 	dump($this->select('user', '*'));
	// }
}

 ?>