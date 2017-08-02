<?php 
namespace app\Controller;
use system\core\Config;
use system\core\Page;
use app\core\C_Controller;
use app\model\skipModel;
/**
 * 默认控制器(测试)
 */
class SkipController extends C_Controller
{
	private $_skip;

	public function __construct()
	{
		parent::__construct();
		$this->_skip = new skipModel();
	}

	public function index()
	{
		// $skipData = $this->_skip->select('skip', '*');

		if(isset($_GET['page'])) {
			$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		}else {
			$now_page = 1;
		}
		// 取得每页条数
		$pageNum           = Config::get('PAGE_NUM', 'page');
		// 计算偏移量
		$offset            = $pageNum * ($now_page - 1);

		$data['count']     = $this->_skip->count('skip');
		$data['skipData'] = $this->_skip->select('skip', '*', ['LIMIT' => [$offset, $pageNum]]);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}');
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();

		// 获取菜单列表
		$data['menu']['menuData'] = self::$menuData;
		view('skip/index', $data);
	}

	public function add()
	{
		if(post()) {
			if(intval(post('id'))) {
				$uptData = [
					'name'           => post('name'),
					'last_edit_time' => time(),
					'last_edit_uid'  => 1
				];
				$this->_skip->update('skip', $uptData, ['id' => intval(post('id'))]);
			}else {
				$insData = [
					'name'           => post('name'),
					'create_time'    => time(),
					'last_edit_time' => time(),
					'last_edit_uid'  => 1
				];
				$this->_skip->insert('skip', $insData);
			}
		}
		$this->index();
		// view('skip/index');
	}

	/**
	 * 根据ID获取数据信息
	 * @return json 
	 */
	public function get_by_pk()
	{
		ajaxReturn($this->_skip->byPkGetInfo(get('id')));
	}

	/**
	 * 根据主键删除
	 */
	public function delete_by_id()
	{
		$id = intval(get('id'));
		if($id) {
			$flag = $this->_skip->byPkDel($id);
			if($flag) $this->index();
		}
	}
}