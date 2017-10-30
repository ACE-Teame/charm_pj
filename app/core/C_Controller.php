<?php 
namespace app\core;

use system\core\Controller;
use Detection\MobileDetect;
/**
 * 公共控制器
 */
class C_Controller extends Controller
{	
	/**
	 * 生命模型对象变量
	 */
	public $_model;

	/**
	 * 声明菜单组静态变量
	 */
	public static $menuData;

	/**
	 * 声明登陆者管理组变量
	 */
	public static $loginGroupId;

	/**
	 * 最低级管理组ID
	 */
	public $selfGroupIds   = [5, 6];

	/**
	 * 优化师职位管理组ID
	 */
	public $managerGroupId = 4;

	/**
	 * 最高权限组ID
	 * @var integer
	 */
	public $adminGroupId   = 2;


	public function __construct() 
	{
		if(empty($this->_model)) {
			$this->_model =& model();
		}
		
		session_start();
		$_SESSION['is_url_check'] = 0;
		if($_SESSION['is_url_check'] != 1) {
			$this->_check_domain();
		}
		
		if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
			redirect('common/login');
		}
		if(empty(self::$loginGroupId))
		{
			self::$loginGroupId = $_SESSION['group_id'];
		}
		$this->setMenu();
	}

	/**
	 * 判断当前登陆城市是否是子链接需要屏蔽的城市
	 * @param  int $linkId 子链接ID
	 */
	private function _check_address($linkId)
	{	
		if($linkId) {
			$addressData = $this->_model->select('link_address', [
					'[>]address' => ['address_id' => 'id']
				],'name', ['link_id' => $linkId]);
		}

		$nowCity = GetIpLookup();
		// file_put_contents('GetIpLookup.log', json_encode(GetIpLookup('','')) . PHP_EOL, FILE_APPEND);
		if($nowCity && is_array($addressData) && !empty($addressData)) {
			if(in_array($nowCity, $addressData)) {
				return TRUE;
			}else {
				return FALSE;
			}
		}
		return FALSE;	
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
		 * 如果存在 则先判断屏蔽地区 再进行相应的操作
		 * 1、判断当前域名c参数是否有值 如果没值说明是单一域名访问 直接查询link_content数据 进行模板赋值
		 * 2、判断审核地区 如果当前子链接符合屏蔽地区条件 不论PC或手机都跳往审核页面
		 * 3、审核没通过  手机端和PC端都跳转向审核链接
		 * 4、审核通过 手机端前往推广链接  PC端前往审核链接
		 */
		if($domainId) {
			$c = get('c');
			$linkContData = $this->_model->select('link_content', '*', ['domain_id' => $domainId])[0];


			if(empty($c)){
				if($linkContData && is_array($linkContData)) {
					if($linkContData['display_page'] == 1) {
						view('temp/goods', ['linkContData' => $linkContData]);
					}else {
						view('temp/games', ['linkContData' => $linkContData]);
					}
					exit;
				}else {
					view('error');exit;
				}
			}else {
				$oneLink = $this->_model->select('link', ['id', 'referral_link', 'audit_link', 'is_pass'], [
					'domain_id'    => $domainId,
					'orginal_link' => $c,
					'LIMIT'        => 1
					])[0];
				if($oneLink) {

					/**
					 * 检测屏蔽地区  为TRUE表示是屏蔽地区 走审核页面
					 */
					$isCkeck = $this->_check_address($oneLink['id']);

					$_SESSION['is_url_check'] = 1;
					$detector = new MobileDetect();

					/**
					 * 如果审核链接有内容
					 * 1、当是PC端或者当前为屏蔽地区时 跳转到审核链接
					 * 2、当是移动端 跳转到推广链接
					 */
					if( !empty($oneLink['audit_link']) ) {
						if(($detector->isMobile() === false) OR ($isCkeck == TRUE)) {
							redirect(htmlspecialchars_decode($oneLink['audit_link']), TRUE);
						}else {
							redirect(htmlspecialchars_decode($oneLink['referral_link']), TRUE);
						}
						exit;
					}
					
					// 审核没通过
					if(($oneLink['is_pass'] == 0) OR ($isCkeck == TRUE)) {
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
							redirect(htmlspecialchars_decode($oneLink['referral_link']), TRUE);
						}
					}
				}else {
					view('error');exit;
				}
			}
		}else {
			// if($urlName != 'link.teamtoptech.com') {
			if($urlName != 'charm_pj.com') {
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

	/**
	 * 根据当前登录者组别 获取位于权限下的用户列表
	 * @return array
	 * @date(2017.8.27)
	 */
	public function byGroupGetUser()
	{
		if(self::$loginGroupId == $this->adminGroupId) {
			return $this->_model->select('user', ['id', 'name']);
		}else if(self::$loginGroupId == $this->managerGroupId) {
			/**
			 * 如果当前登录者 属于优化经理组 则取出部门下所有人员
			 * 1、取出登陆者部门
			 * 2、根据部门ID获取成员信息
			 */
			$loginSectionId = $this->_model->select('user', 'section_id', ['id' => $_SESSION['uid'], 'LIMIT' => 1])[0];
			return $this->_model->select('user', ['id', 'name'], ['section_id' => $loginSectionId]);
		}else if(in_array(self::$loginGroupId, $this->selfGroupIds)) {
			// 如果当前登陆者位于普通组别里 则只取出自己的数据
			return $this->_model->select('user', ['id', 'name'], ['id' => $_SESSION['uid']]);
		}else {
			return FALSE;
		}
	}
}

