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
		// $this->_model =& model(); 
	}

	public function skip()
	{

		$data['userData']    = $this->_model->select('user', ['id', 'name']);
		$data['domainData']  = $this->_model->select('domain', ['id', 'domain']);
		$data['addressData'] = $this->_model->select('address', ['id', 'name']);
		view('link/skip', $data);
	}


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
				$this->_model->update('user', $uptData, ['id' => intval(post('id'))]);
			}else {
				$insData = [
					'name'          => post('name'),
					'create_time'   => time(),
					'update_time'   => time(),
					'pwd'           => password_hash(post('pwd'), PASSWORD_DEFAULT),
					'group_id'      => post('group_id'),
					'section_id'    => post('section_id'),
				];
				$this->_model->insert('user', $insData);
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