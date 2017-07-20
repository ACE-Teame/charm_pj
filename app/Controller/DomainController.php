<?php 
namespace app\Controller;
use system\core\Config;
use system\core\Page;
use app\core\C_Controller;
use app\model\DomainModel;
/**
 * 默认控制器(测试)
 */
class DomainController extends C_Controller
{
	private $_domain;

	public function __construct()
	{
		parent::__construct();
		$this->_domain = new DomainModel();
	}

	/**
	 * 组装查询条件
	 */
	private function _getSearch()
	{
		if(get('domain')) {
			$where['domain[~]'] = get('domain');
		}
		if(get('url')) {
			$where['url[~]']    = get('url');
		}
		return $where;
	}


	public function index()
	{
		
		if(isset($_GET['page'])) {
			$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		}else {
			$now_page = 1;
		}

		// 获得查询条件
		$where = $this->_getSearch();

		// 取得每页条数
		$pageNum           = Config::get('PAGE_NUM', 'page');
		// 计算偏移量
		$offset            = $pageNum * ($now_page - 1);

		$data['count']     = $this->_domain->count('domain', $where);

		$where['LIMIT'] = [$offset, $pageNum];
		$data['domainData'] = $this->_domain->select('domain', '*', $where);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}' . $this->getSearchParam());
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();
		view('domain/index', $data);
	}

	/**
	 * 拼接查询条件
	 * @return array
	 */
	public function getSearch()
	{
		if(get('name')) 
			$where['name[~]'] = get('name');
		if(get('create_uid')) {

		}
		
		return $where;
	}

	public function add()
	{
		if(post()) {
			$id = intval(post('id'));
			if($id) {
				$uptData = [
					'domain'      => post('domain'),
					'url'         => post('url'),
				];
				$this->_domain->update('domain', $uptData, ['id' => $id]);
			}else {
				$insData = [
					'domain'      => post('domain'),
					'url'         => post('url'),
					'create_time' => time(),
					'create_uid'  => $_SESSION['uid']
				];


				$this->_domain->insert('domain', $insData);
			}
		}
		redirect('domain');
	}

	/**
	 * 根据ID获取数据信息
	 * @return json 
	 */
	public function get_by_pk()
	{
		ajaxReturn($this->_domain->byPkGetInfo(get('id')));
	}

	/**
	 * 根据主键删除
	 */
	public function delete_by_id()
	{
		$id = intval(get('id'));
		if($id) {
			$flag = $this->_domain->byPkDel($id);
			if($flag) redirect('domain');
		}
	}
}