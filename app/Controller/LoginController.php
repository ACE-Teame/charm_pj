<?php 
namespace app\Controller;
use system\core\Model;
use app\core\C_Controller;

/**
 * 默认控制器(测试)
 */
class LoginController extends C_Controller
{
	public function index()
	{
		view('login/index');
	}
}