<?php 
namespace app\Controller;
use system\core\Config;
use system\core\Page;
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
		parent::__construct();
		$this->_userModel = new UserModel();
	}



	/**
	 * 1.补充用户列表部门、组信息
	 * 2.取出部门和组信息列表
	 * @param  array &$data 
	 */
	private function _arrangeData(&$data)
	{
		$groupModel   = new \app\model\GroupModel;
		$sectionModel = new \app\model\SectionModel;
		foreach ($data['userData'] as $key => $user) {
			$data['userData'][$key]['groupName'] = $groupModel->byPkGetInfo($user['group_id'], ['name'])['name'];
			$data['userData'][$key]['sectionName'] = $sectionModel->byPkGetInfo($user['section_id'], ['name'])['name'];
		}

		$data['groupData']   = $groupModel->select('', ['id', 'name']);
		$data['sectionData'] = $sectionModel->select('', ['id', 'name']);

	}

	/**
	 * 用户列表
	 */
	public function index()
	{
		$where = $this->_getSearch();
		if(isset($_GET['page'])) {
			$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		}else {
			$now_page = 1;
		}
		// 取得每页条数
		$pageNum           = Config::get('PAGE_NUM', 'page');
		// 计算偏移量
		$offset            = $pageNum * ($now_page - 1);

		$data['count']     = $this->_userModel->count('user', $where);
		$where['LIMIT']     = [$offset, $pageNum];

		$data['userData']  = $this->_userModel->select('user', '*', $where);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}');
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();

		$this->_arrangeData($data);
		// 获取菜单列表
		$data['menu']['menuData'] = self::$menuData;
		view('user/index', $data);
	}

	/**
	 * 拼接查询条件
	 * @return array
	 */
	public function _getSearch()
	{
		if(get('name')) 
			$where['name[~]'] = get('name');
		if(get('section_id')) {
			$where['section_id[~]'] = get('section_id');			
		}
		if(get('group_id')) {
			$where['group_id[~]'] = get('group_id');
		}
		return $where;
	}

	
	/**
	 * 增加/修改用户
	 */
	public function add()
	{
		if(post()) {
			if(intval(post('id'))) {
				$uptData = [
					'name'          => post('name'),
					'update_time'   => time(),
					'group_id'      => post('group_id'),
					'section_id'    => post('section_id'),
				];
				if(post('pwd')) $uptData['pwd'] = password_hash(post('pwd'), PASSWORD_DEFAULT);
				$this->_userModel->update('user', $uptData, ['id' => intval(post('id'))]);
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
		redirect('user');
	}

	/**
	 * 根据ID获取数据信息
	 * @return json 
	 */
	public function get_by_pk()
	{
		ajaxReturn($this->_userModel->byPkGetInfo(get('id')));
	}

	/**
	 * 根据主键删除
	 */
	public function delete_by_id()
	{
		$id = intval(get('id'));
		if($id) {
			$flag = $this->_userModel->byPkDel($id);
			if($flag) redirect('user');
		}
	}
}