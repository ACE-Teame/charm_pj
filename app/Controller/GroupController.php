<?php 
namespace app\Controller;
use system\core\Config;
use system\core\Page;
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

	/**
	 * 取得列表数据
	 * Medoo limit用法 ['LIMIT' => [offset, page_num]]
	 * @return array 
	 */
	public function index()
	{
		if(isset($_GET['page'])) {
			$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		}else {
			$now_page = 1;
		}
		// 取得每页条数
		$pageNum           = Config::get('PAGE_NUM', 'page');
		// 计算偏移量
		$offset            = $pageNum * ($now_page - 1);

		$data['count']     = $this->_groupModel->count('group');
		$data['groupData'] = $this->_groupModel->select('group', '*', ['LIMIT' => [$offset, $pageNum]]);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}');
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();
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
				$this->_groupModel->update('group', $uptData, ['id' => intval(post('id'))]);
			}else {
				$insData = [
					'name'        => post('name'),
					'discription' => post('discription'),
					'create_time' => time()
				];
				$this->_groupModel->insert('group', $insData);
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

	/**
	 * 根据主键删除
	 */
	public function delete_by_id()
	{
		$id = intval(get('id'));
		if($id) {
			$flag = $this->_groupModel->byPkDel($id);
			if($flag) $this->index();
		}
	}
}