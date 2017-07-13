<?php 
namespace app\Controller;
use app\core\C_Controller;
// use app\model\GroupModel;

/**
 * 权限管理模块
 */
class GroupController extends C_Controller
{
	private $_groupModel;
	public function __construct()
	{
		parent::__construct();
		// $this->_groupModel = new GroupModel();
	}

	public function index()
	{

		$data['groupData'] = $this->_model->select('group', '*');
		// dump($data);
		view('group/index', $data);
	}

	/**
	 * 增加
	 */
	public function add()
	{
		if(post()) {
			$insData = [
				'name'        => post('name'),
				'discription' => post('discription'),
				'create_time' => time()
			];

			$this->_groupModel->insert('group', $insData);
		}

		view('group/index');
	}

	public function get_by_pk()
	{
		if(get('id')) {
			$groupInfo = $this->_model->select('group', '*', ['id' => get('id')]);
			ajaxReturn($groupInfo[0]);
		}
	}
}