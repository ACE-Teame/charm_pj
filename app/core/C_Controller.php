<?php 
namespace app\core;

use system\core\Controller;
use Detection\MobileDetect;
/**
 * 公共控制器
 */
class C_Controller extends Controller
{
	public $_model;
	public static $menuData;
	public function __construct() 
	{
		if(empty($this->_model)) {
			$this->_model =& model();
		}
		file_put_contents('GetIpLookup.log', json_encode(GetIpLookup()) .PHP_EOL, FILE_APPEND);
		session_start();
		$_SESSION['is_url_check'] = 0;
		if($_SESSION['is_url_check'] != 1) {
			$this->_check_domain();
		}
		
		if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
			redirect('common/login');
		}
		$this->setMenu();
	}

	/**
	 * 检测当前域名的可跳转性
	 */
	private function _check_domain()
	{
		// 得出访问域名
		if(strpos($_SERVER['HTTP_HOST'], ':') === FALSE) {
			$urlName = trim($_SERVER['HTTP_HOST'], '/');
		}else {
			$urlName = explode(':', $_SERVER['HTTP_HOST'])[0];
		}
		// 计算访问的域名有没有在数据库
		$domainId = $this->_model->select('domain', 'id', ['url' => $urlName, 'LIMIT' => 1])[0];
		
		/**
		 * 如果数据库中域名存在
		 * 根据参数计算是属于域名下的哪条原始链接
		 * 如果存在 则取出链接的审核内容
		 * 1、审核没通过  手机端和PC端都跳转向审核链接
		 * 2、审核通过 手机端前往推广链接  PC端前往审核链接
		 */
		if($domainId) {
			$oneLink = $this->_model->select('link', ['id', 'referral_link', 'audit_link', 'is_pass'], [
				'domain_id'    => $domainId,
				'orginal_link' => get('c'),
				'LIMIT'        => 1
				])[0];
			// dump($oneLink);exit;
			if($oneLink) {
				$_SESSION['is_url_check'] = 1;
				$detector     = new MobileDetect();
				$linkContData = $this->_model->select('link_content', '*', [
					'link_id' => $oneLink['id'],
					'LIMIT'   => 1
					])[0];
				// 审核没通过
				if($oneLink['is_pass'] == 0) {
					if($linkContData['display_page'] == 1) {
						view('temp/goods', ['linkContData' => $linkContData]);
					}else {
						view('temp/games', ['linkContData' => $linkContData]);
					}
					exit;
				}else {
					if($detector->isMobile() === false) {
						if($linkContData['display_page'] == 1) {
							view('temp/goods', ['linkContData' => $linkContData]);
						}else {
							view('temp/games', ['linkContData' => $linkContData]);
						}
						exit;
					}else {
						redirect($oneLink['referral_link'], TRUE);
					}
				}
			}else {
				view('error');exit;
			}
		}else {
			if($urlName != 'link.teamtoptech.com') {
			// if($urlName != 'charmpj.com') {
				view('error');exit;
			}else {
				$_SESSION['is_url_check'] = 1;
			}
		}
	}
	
	/**
	 * 设置当前用户的菜单数据到SESSION && 赋值menuData
	 */
	public function setMenu()
	{
		if(!isset($_SESSION['menu']) || empty($_SESSION['menu'])) {
			$loginGroupId = $_SESSION['group_id'];
			$menuIds = $this->_model->select('groupmenu', 'menu_id', ['group_id' => $loginGroupId]);

			foreach ($menuIds as $menuId) {
				// 获取子菜单信息
				$menuSonData = $this->_model->select('menu', ['pid', 'url', 'name', 'class'], ['status' => 1, 'id' => $menuId])[0];
				if($menuSonData['pid'] > 0) {
					// 获取父菜单数据
					$menuParent = $this->_model->select('menu', ['id', 'url', 'name'], ['status' => 1, 'id' => $menuSonData['pid']])[0];
					if($menuParent && is_array($menuParent)) {
						// 简单树形赋值
						if(!isset($menuData[$menuParent['id']])) {
							$menuData[$menuParent['id']] = $menuParent;
							$menuData[$menuParent['id']]['son'][$menuId] = $menuSonData;
						}else {
							$menuData[$menuParent['id']]['son'][$menuId] = $menuSonData;
						}
					}
				}
			}
			/**
			 * 设置session menu
			 * 赋值menuData
			 */
			$_SESSION['menu'] = serialize($menuData);
			self::$menuData   = $menuData;
			return TRUE;
		}

		if(!isset(self::$menuData) || empty(self::$menuData)) {
			self::$menuData = unserialize($_SESSION['menu']);
		}
	}

	// 组合查询数据到url
	public function getSearchParam() 
	{
		$searchParam = '';
		foreach (get() as $key => $value) {
			if( $key == 'page' ) continue;
			if( !empty($value) ) $searchParam .= '&'. $key . '=' . $value;
		}

		return $searchParam;
	}
	
}

 ?>