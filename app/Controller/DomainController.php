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
		$this->_domain = new domainModel();
	}

	public function index()
	{
		// $domainData = $this->_domain->select('domain', '*');

		if(isset($_GET['page'])) {
			$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		}else {
			$now_page = 1;
		}
		// 取得每页条数
		$pageNum           = Config::get('PAGE_NUM', 'page');
		// 计算偏移量
		$offset            = $pageNum * ($now_page - 1);

		$data['count']     = $this->_domain->count('domain');
		$data['domainData'] = $this->_domain->select('domain', '*', ['LIMIT' => [$offset, $pageNum]]);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}');
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
			if(intval(post('id'))) {
				$uptData = [
					'name'           => post('name'),
					'create_time'    => time()
				];
				$this->_domain->update('domain', $uptData, ['id' => intval(post('id'))]);
			}else {
				$insData = [
					'name'           => post('name'),
					'create_time'    => time(),
					'create_uid'  => 1
				];
				$this->_domain->insert('domain', $insData);
			}
		}
		$this->index();
		// view('domain/index');
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
			if($flag) $this->index();
		}
	}
}