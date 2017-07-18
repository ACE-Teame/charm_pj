<?php 
namespace app\Controller;
use system\core\Config;
use app\core\C_Controller;
use app\model\UserModel;

/**
 * 默认控制器(测试)
 */
class IndexController extends C_Controller
{

	/**
	 * 首页列表
	 */
	public function index()
	{
		$userModel        = new UserModel();
		$data['userData'] = $userModel->select('', ['id', 'name', 'login_time', 'ip'],
			['ORDER' => ['login_time' => DESC], 'LIMIT' => 8]);
		view('index', $data);
	}

	
}