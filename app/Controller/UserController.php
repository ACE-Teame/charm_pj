<?php 
namespace app\Controller;
use app\model\UserModel;
use app\model\SectionModel;
use system\core\Controller;

/**
 * 默认控制器(测试)
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
}