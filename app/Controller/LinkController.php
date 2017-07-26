<?php 
namespace app\Controller;
use system\core\Config;
use system\core\Page;
use app\core\C_Controller;

/**
 * 链接跳转
 * @author 命中水、
 * @date(2017.7.20)
 */
class LinkController extends C_Controller
{
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

	public function link()
	{
		view('link/link');
	}

	
	/**
	 * 添加/修改链接内容
	 */
	public function linkEdit()
	{
		$data['domainData'] = $this->_model->select('domain', ['id', 'domain']);

		view('link/linkedit', $data);
	}

	public function by_domainid_get_pinfo()
	{
		$domain_id = intval(post('domain_id'));
		if($domain_id) {
			$linkData = $this->_model->select('link',['id', 'orginal_link'], ['domain_id' => $domain_id]);
			ajaxReturn(200, $linkData);
		}
		ajaxReturn(202);
	}

	public function by_linkid_get_leader()
	{
		$linkId = intval(post('link_id'));
		if($linkId) {
			$leadId = $this->_model->select('link', 'leading_uid', ['id' => $linkId])[0];

			if($leadId) {
				$userName = $this->_model->select('user', 'name', ['id' => $leadId])[0];
				ajaxReturn(200, $userName);

			}
			ajaxReturn(202);
		}
		ajaxReturn(202);
	}
}