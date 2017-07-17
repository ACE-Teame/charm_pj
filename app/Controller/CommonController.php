<?php 
namespace app\Controller;
use system\core\Model;
use system\core\Controller;
use app\model\UserModel;

/**
 * 登陆控制器(测试)
 */
class CommonController extends Controller
{

	/**
	 * 登陆
	 */
	public function login()
	{
		if(post('name') && post('pwd')) {
			session_start();
			$userModel = new UserModel();
			$userInfo  = $userModel->select('user', ['id', 'pwd'], ['name' => trim(post('name'))])[0];
			if(password_verify(post('pwd'), $userInfo['pwd']) == TRUE){
				$_SESSION['uid']  = $userInfo['id'];
				$_SESSION['name'] = trim(post('name'));
				redirect('index');
			}
		}
		view('login/index');
	}

	public function logout()
	{
		unset($_SESSION['uid']);
		redirect('common/login');
	}
}