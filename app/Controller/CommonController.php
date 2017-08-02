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
			$userInfo  = $userModel->select('user', ['id', 'pwd', 'group_id'], ['name' => trim(post('name'))])[0];
			if(password_verify(post('pwd'), $userInfo['pwd']) == TRUE){
				// 记录用户最后一次登录时间
				$userModel->update('user', [
					'login_time' => time(),
					'ip'         => getIp()], 
					['id' => $userInfo['id']]
					);
				$_SESSION['uid']  	  = $userInfo['id'];
				$_SESSION['name'] 	  = trim(post('name'));
				$_SESSION['group_id'] = $userInfo['group_id'];
				$_SESSION['menu']     = '';
				redirect('home');
			}
		}
		view('login/index');
	}

	public function logout()
	{
		unset($_SESSION['uid'], $_SESSION['name'], $_SESSION['group_id']);
		redirect('common/login');
	}
}