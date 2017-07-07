<?php 
namespace app\Controller;
use system\core\Model;
use system\core\Controller;

/**
 * 默认控制器(测试)
 */
class LoginController extends Controller
{
	public function index()
	{
		view('login/index');
	}
}