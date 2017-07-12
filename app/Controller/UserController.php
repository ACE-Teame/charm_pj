<?php 
namespace app\Controller;
use app\model\UserModel;
use app\model\SectionModel;
use system\core\Controller;

/**
 * 用户模块
 * @author 命中水、
 * @date(2017.7.12)
 */
class UserController extends Controller
{
	// static private $model = [];
	public function __construct()
	{

	}

	public function index()
	{

		$userModel = new UserModel();
		$userInfo = $userModel->select('user', '*');
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