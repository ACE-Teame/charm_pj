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

	public function __construct()
	{
		session_start();
	}

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
				$userModel->update('user', 
					[
						'login_time' => time(),
						'ip'         => getIp()
					], ['id' => $userInfo['id']]);
				$_SESSION['uid']  	  = $userInfo['id'];
				$_SESSION['name'] 	  = trim(post('name'));
				$_SESSION['group_id'] = $userInfo['group_id'];
				$_SESSION['menu']     = '';
				redirect('home');
			}else{
				echo "<script>alert('账号或密码错误！');location.href='". base_url() ."'</script>";
				exit;
			}
		}
		view('login/index');
	}

	/**
	 * 	退出时销毁session && 跳转到登陆页面
	 */
	public function logout()
	{
		unset($_SESSION);
		session_destroy(); 
		redirect('common/login');
	}
}