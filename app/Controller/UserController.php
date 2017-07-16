<?php 
namespace app\Controller;
use app\core\C_Controller;
use app\model\UserModel;
use app\model\SectionModel;

/**
 * 用户模块
 * @author 命中水、
 * @date(2017.7.12)
 */
class UserController extends C_Controller
{
	private $_userModel;
	public function __construct()
	{
		$this->_userModel = new UserModel();
	}

	public function index()
	{

		dump(123);
		$data['userData'] = $this->_userModel->select('user', '*');
		view('user/index', $data);
	}

	public function add()
	{
		// dump(post());
		// exit;
		// if(post()) {
		// 	$insData = [
		// 		'name' => post('name'),
		// 		'create_time' => time(),
		// 		'last_edit_time' => time(),
		// 		'last_edit_uid' => 1
		// 	];
		if(post()) {
			if(intval(post('id'))) {
				$uptData = [
					'name'        => post('name'),
					'discription' => post('discription'),
				];
				$this->_userModel->update('group', $uptData, ['id' => intval(post('id'))]);
			}else {
				$insData = [
					'name'          => post('name'),
					'create_time'   => time(),
					'update_time'   => time(),
					'pwd'           => password_hash(post('pwd'), PASSWORD_DEFAULT),
					'group_id'      => post('group_id'),
					'section_id'    => post('section_id'),
				];

				$this->_userModel->insert('user', $insData);
			}
		}
		// redirect('user/index');
		$this->index();
	}
}