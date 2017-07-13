<?php 
namespace app\Controller;
use app\core\C_Controller;
use app\model\UserModel;
use app\model\SectionModel;

/**
 * 用户模块
 * @author 命中水、
 * @date(2017.7.12)
 */
class UserController extends C_Controller
{
	private $_userModel;
	public function __construct()
	{
		$this->_userModel = new UserModel();
	}

	public function index()
	{
		$userModel = new UserModel();
		$userInfo = $this->_userModel->select('user', '*');
		dump($userInfo);
		view('user/index');
	}

	public function add()
	{

		// if(post()) {
		// 	$insData = [
		// 		'name' => post('name'),
		// 		'create_time' => time(),
		// 		'last_edit_time' => time(),
		// 		'last_edit_uid' => 1
		// 	];

		// 	$insId = $this->section->insert('section', $insData);
		// }
		dump(post());
		view('user/index');
	}
}