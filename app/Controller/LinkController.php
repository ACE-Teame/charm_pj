<?php 
namespace app\Controller;
use app\core\C_Controller;

/**
 * 默认控制器(测试)
 */
class LinkController extends C_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 整合链接数据 取出负责人姓名和屏蔽读取
	 * @param  array &$data 待整合数组
	 */
	private function _arrangeData(&$data)
	{
		$userModel = new \app\model\UserModel();
		if(is_array($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				$data[$key]['leadName'] = $userModel->byPkGetInfo($value['leading_uid'], 'name');
				$addressIds = $this->_model->select('link_address', 'address_id', ['link_id' => $value['id']]);
				if($addressIds) {
					$addressName = '';
					$addressModel = new \app\model\AddressModel();
					foreach ($addressIds as $key => $addressId) {
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

		$data['linkData'] = $this->_model->select('link', '*');
		$this->_arrangeData($data['linkData']);
		view('link/skip', $data);
	}



	public function add()
	{
		if(post()) {
			if(intval(post('id'))) {
				$uptData = [
					'leading_uid'    => post('leading_uid'),
					'domain_id'      => post('domain_id'),
					'orginal_link'   => post('orginal_link'),
					'referral_link'  => post('referral_link'),
					'audit_link'     => post('audit_link'),
					'last_edit_uid'  => $_SESSION['uid'],
					'last_edit_time' => time()
				];
				$this->_model->update('link', $uptData, ['id' => intval(post('id'))]);
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
				$addressIds = post('address_id');
				if($insId) {
					foreach ($addressIds as $key => $addressId) {
						$this->_model->insert('link_address', ['link_id' => $insId, 'address_id' => $addressId]);
					}
				}
			}
		}
		redirect('link/skip');
	}
	public function link()
	{
		view('link/link');
	}
	public function linkEdit()
	{
		view('link/link-edit');
	}
}