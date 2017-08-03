<?php 
namespace app\Controller;
use system\core\Config;
use system\core\Page;
use app\core\C_Controller;
use app\model\LinkModel;
/**
 * 链接跳转
 * @author 命中水、
 * @date(2017.7.20)
 */
class LinkController extends C_Controller
{	
	private $_selfGroupIds   = [5, 6];
	private $_managerGroupId = 4;
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 整合链接数据 取出负责人姓名和屏蔽地区
	 * @param  array &$data 待整合数组
	 */
	private function _arrangeData(&$data)
	{
		$userModel   = new \app\model\UserModel();
		$domainModel = new \app\model\DomainModel();
		if(is_array($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				$data[$key]['leadName'] = $userModel->byPkGetInfo($value['leading_uid'], 'name');
				$data[$key]['domain'] = $domainModel->byPkGetInfo($value['domain_id'], 'domain');
				$addressIds = $this->_model->select('link_address', 'address_id', ['link_id' => $value['id']]);
				if($addressIds) {
					$addressName  = '';
					$addressModel = new \app\model\AddressModel();
					foreach ($addressIds as $addressId) {
						$addressName .= $addressModel->byPkGetInfo($addressId, 'name') . ',';
					}
					$data[$key]['addressName'] = rtrim($addressName, ',');
				}
			}
		}
	}

	/**
	 * 链接跳转列表
	 */
	public function skip()
	{
		$data['userData']    = $this->_model->select('user', ['id', 'name']);
		$data['domainData']  = $this->_model->select('domain', ['id', 'domain']);
		$data['addressData'] = $this->_model->select('address', ['id', 'name']);

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

		$data['count']     = $this->_model->count('link', $where);
		$where['LIMIT']    = [$offset, $pageNum];
		$data['linkData']  = $this->_model->select('link', '*', $where);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}' . $this->getSearchParam());
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();
		$this->_arrangeData($data['linkData']);
		// 获取菜单列表
		$data['menu']['menuData'] = self::$menuData;

		view('link/skip', $data);
	}

	/**
	 * 组装查询条件
	 */
	private function _getSearch()
	{
		if(get('orginal_link')) {
			$where['orginal_link[~]'] = get('orginal_link');
		}
		if(get('audit_link')) {
			$where['audit_link[~]']   = get('audit_link');
		}
		if(get('referral_link')) {
			$where['referral_link[~]'] = get('referral_link');
		}
		if(intval(get('leading_uid'))) {
			$where['leading_uid'] = intval(get('leading_uid'));
		}
		if(in_array($_SESSION['uid'], $this->_selfGroupIds)) {
			$where['leading_uid'] = $_SESSION['uid'];
		}else if($_SESSION['group_id'] == $this->_managerGroupId) {
			/**
			 * 如果当前登录者是优化经理职位 则取出同部门下的所有人员ID
			 * 作为跳转链接里负责人的查询条件
			 */
			$loginSectionId = $this->_model->select('user', 'section_id', ['id' => $_SESSION['uid'], 'LIMIT' => 1])[0];
			$userIds        = $this->_model->select('user', 'id', ['section_id' => $loginSectionId]);
			$where['OR']    = ['leading_uid' => $userIds];
		}

		return $where;
	}



	/**
	 * 增加/修改链接
	 */
	public function add()
	{
		if(post()) {
			$id = intval(post('id'));
			if(!empty($id)) {
				$uptData = [
					'leading_uid'    => post('leading_uid'),
					'domain_id'      => post('domain_id'),
					'orginal_link'   => post('orginal_link'),
					'referral_link'  => post('referral_link'),
					'audit_link'     => post('audit_link'),
					'last_edit_uid'  => $_SESSION['uid'],
					'last_edit_time' => time()
				];
				$this->_model->delete('link_address', ['link_id' => $id]);
				$this->_model->update('link', $uptData, ['id' => $id]);
			}else {
				$insData = [
					'leading_uid'    => post('leading_uid'),
					'domain_id'      => post('domain_id'),
					'orginal_link'   => post('orginal_link'),
					'referral_link'  => post('referral_link'),
					'audit_link'     => post('audit_link'),
					'creat_uid'      => $_SESSION['uid'],
					'creat_time'     => time(),
					'last_edit_uid'  => $_SESSION['uid'],
					'last_edit_time' => time()
				];
				$this->_model->insert('link', $insData);
				$insId      = $this->_model->id();
				
			}
			$linkId    = $insId ? $insId : $id;
			$addressIds = post('address_id');
			if($linkId && $addressIds) {
				foreach ($addressIds as $key => $addressId) {
					$this->_model->insert('link_address', ['link_id' => $linkId, 'address_id' => $addressId]);
				}
			}
		}
		redirect('link/skip');
	}

	/**
	 * 获取链接数据
	 */
	public function get_by_pk()
	{
		$linkId = intval(get('id'));
		if($linkId) {
			$linkModel   = new \app\model\LinkModel();
			$data['linkData']    = $linkModel->byPkGetInfo($linkId);
			$data['linkAddData'] = $linkModel->select('link_address', 'address_id', ['link_id' => $linkId]);
			ajaxReturn($data);
		}else {
			echo 0;
		}
	}

	/**
	 * 删除链接跳转
	 */
	public function del_skip()
	{
		$id = intval(get('id'));
		if($id) {
			$linkModel  = new \app\model\LinkModel();
			$flag       = $linkModel->byPkDel($id);
			if($flag) redirect('link/skip');
		}
	}

	/**
	 * 链接内容获取搜索条件
	 * @return array 
	 */
	private function _getSearchLink()
	{
		if(get('user_id')) {
			$where['leading_uid'] = get('user_id');
		}
		if(get('company_name')) {
			$where['company_name[~]']   = get('company_name');
		}

		if(in_array($_SESSION['group_id'], $this->_selfGroupIds)) {
			$linkIds = $this->_model->select('link', 'id', ['leading_uid' => $_SESSION['uid']]);
			if($linkIds && is_array($linkIds)) {
				$where['OR']   = [
					'link_id' => $linkIds
				];
			}
		}else if($_SESSION['group_id'] == $this->_managerGroupId) {
			/**
			 * 如果当前登录者是优化经理职位 则取出同部门下的所有人员ID
			 * 通过人员ID作为负责人条件 查询取得链接跳转ID
			 * 把链接跳转ID作为链接内容的查询条件
			 */
			$loginSectionId = $this->_model->select('user', 'section_id', ['id' => $_SESSION['uid'], 'LIMIT' => 1])[0];
			$userIds        = $this->_model->select('user', 'id', ['section_id' => $loginSectionId]);
			$linkIds	    = $this->_model->select('link', 'id', ['OR' => ['leading_uid' => $userIds]]);
			$where['OR']    = [
					'link_id' => $linkIds
				];
		}
		return $where;
	}


	/**
	 * 链接内容列表
	 */
	public function link()
	{
		if(isset($_GET['page'])) {
			$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		}else {
			$now_page = 1;
		}
		// 获得查询条件
		$where = $this->_getSearchLink();
		// 取得每页条数
		$pageNum           = Config::get('PAGE_NUM', 'page');
		// 计算偏移量
		$offset            = $pageNum * ($now_page - 1);

		$data['count']     = $this->_model->count('link_content', $where);
		$where['LIMIT']    = [$offset, $pageNum];

		/**
		 * 数据表关联 取出数据
		 */
		$data['linkContentData'] = $this->_model->select('link_content', [
				'[>]link'   => ['link_id' => 'id'],
				'[>]domain' => ['link.domain_id' => 'id'],
				'[>]user'   => ['link.leading_uid' => 'id']
			],[
				'link_content.id',
				'domain.url',
				'link.orginal_link',
				'link_content.company_name',
				'link_content.create_time',
				'link_content.update_time',
				'user.name'
			], $where);
		// 分页处理
		$objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}' . $this->getSearchParam());
		$data['pageNum']   = $pageNum;
		$data['pageList']  = $objPage->myde_write();
		$data['userData'] = $this->_model->select('user', ['id', 'name']);
		// 获取菜单列表
		$data['menu']['menuData'] = self::$menuData;
		view('link/link', $data);
	}

	/**
	 * 添加/修改链接内容
	 */
	public function linkEdit()
	{
		$linkContId = intval(get('id'));
		if($linkContId) {
			$linkContentData = $this->_model->select('link_content', '*', ['id' => $linkContId, 'LIMIT' => 1])[0];
			$linkData = $this->_model->select('link',[
					'[>]user' => ['leading_uid' => 'id']
				], ['user.name', 'link.domain_id'], [
					'link.id' => $linkContentData['link_id']
				])[0];

			$domainSonLink = $this->_model->select('link', ['id', 'orginal_link'], ['domain_id' => $linkData['domain_id']]);

			/**
			 * 当为修改时 赋值模板变量内容为 
			 * 1、链接内容ID
			 * 2、域名ID
			 * 3、负责人名字
			 * 4、子链接列表
			 * 5、链接内容数据
			 */
			$data = [
				'id' 			  => $linkContId,
				'domain_id'       => $linkData['domain_id'],
				'leader_name'     => $linkData['name'],
				'domainSonLink'   => $domainSonLink,
				'linkContentData' => $linkContentData
			];

		}
		// 取出域名列表
		$data['domainData'] = $this->_model->select('domain', ['id', 'domain']);
		// 获取菜单列表
		$data['menu']['menuData'] = self::$menuData;
		view('link/linkedit', $data);
	}

	/**
	 * 通过域名ID获取子链接
	 */
	public function by_domainid_get_pinfo()
	{
		$domain_id = intval(post('domain_id'));
		if($domain_id) {
			$linkData = $this->_model->select('link',['id', 'orginal_link'], ['domain_id' => $domain_id]);
			ajaxReturn(200, $linkData);
		}
		ajaxReturn(202);
	}

	/**
	 * 通过链接ID获得负责人
	 */
	public function by_linkid_get_leader()
	{
		$linkId = intval(post('link_id'));
		if($linkId) {
			$leadId = $this->_model->select('link', 'leading_uid', ['id' => $linkId])[0];
			if($leadId) {
				$userName = $this->_model->select('user', 'name', ['id' => $leadId])[0];
				ajaxReturn(200, $userName);
			}
		}
		ajaxReturn(202);
	}

	/**
	 * 通过ajax添加链接跳转内容
	 */
	public function ajax_add_link_content()
	{
		if(post()) {
			$postData = post();
			if(empty(post('id'))){
				unset($postData['id'], $postData['domain_id'], $postData['leader_name']);
				$postData['create_time'] = $postData['update_time'] = time();

				$flag = $this->_model->insert('link_content', $postData);

				if($flag) {
					ajaxReturn(200, '添加成功');
				}else {
					ajaxReturn(202);
				}
			}
		}
	}

	/**
	 * 通过ajax修改链接跳转内容
	 */
	public function ajax_edit_link_content()
	{
		$linkContId = intval(post('id'));
		if($linkContId) {
			$postData = post();
			unset($postData['id'], $postData['domain_id'], $postData['leader_name']);
			$postData['update_time'] = time();
			$flag = $this->_model->update('link_content', $postData, ['id' => $linkContId]);
			if($flag) {
				ajaxReturn(200, '修改成功');
			}else {
				ajaxReturn(202);
			}
		}
	}

	/**
	 * 删除链接内容
	 */
	public function del_link_content()
	{
		$id = intval(post('id'));
		if($id) {
			$delFlag = $this->_model->delete('link_content', ['id' => $id]);
			if($delFlag) ajaxReturn(200);
			ajaxReturn(202);
		}
	}

}