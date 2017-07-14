<?php 
namespace app\Controller;
use app\core\C_Controller;
use app\model\GroupModel;

/**
 * 权限管理模块
 */
class GroupController extends C_Controller
{
	private $_groupModel;
	public function __construct()
	{
		parent::__construct();
		$this->_groupModel = new GroupModel();
	}

	public function index()
	{
		$data['groupData'] = $this->_model->select('group', '*');
		view('group/index', $data);
	}

	/**
	 * 增加/修改
	 */
	public function add()
	{
		if(post()) {
			if(intval(post('id'))) {
				$uptData = [
					'name'        => post('name'),
					'discription' => post('discription'),
				];
				$this->_model->update('group', $uptData, ['id' => intval(post('id'))]);
			}else {
				$insData = [
					'name'        => post('name'),
					'discription' => post('discription'),
					'create_time' => time()
				];
				$this->_model->insert('group', $insData);
			}
		}

		$this->index();
	}

	/**
	 * 根据ID获取数据信息
	 * @return json 
	 */
	public function get_by_pk()
	{
		ajaxReturn($this->_groupModel->byPkGetInfo(get('id')));
	}


	public function delete_by_id()
	{
		if(intval(get('id'))) {
			echo get('id');
			$flag = $this->del_by_pk('group', ['id' => get('id')]);
			if($flag) $this->index();
		}
	}
}