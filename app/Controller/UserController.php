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
		$this->_userModel = new UserModel();
	}

	/**
	 * 用户列表
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

		$data['count']     = $this->_userModel->count('user');
		$data['userData'] = $this->_userModel->select('user', '*', ['LIMIT' => [$offset, $pageNum]]);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}');
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();
		view('user/index', $data);
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
		// redirect('user/index');
		$this->index();
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
			if($flag) $this->index();
		}
	}
}