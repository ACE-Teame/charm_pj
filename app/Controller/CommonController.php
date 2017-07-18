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
				// 记录用户最后一次登录时间
				$userModel->update('user', [
					'login_time' => time(),
					'ip'         => getIp()], 
					['id' => $userInfo['id']]
					);
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