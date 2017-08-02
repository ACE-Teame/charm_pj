<?php 
namespace app\Controller;
use system\core\Config;
use app\core\C_Controller;
use app\model\UserModel;

/**
 * 默认控制器
 */
class HomeController extends C_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 首页列表
	 */
	public function index()
	{
		$userModel        = new UserModel();
		$data['userData'] = $userModel->select('', ['id', 'name', 'login_time', 'ip'],
			['ORDER' => ['login_time' => DESC], 'LIMIT' => 3]);
		$data['menu']['menuData'] = self::$menuData;
		view('index', $data);
	}

}