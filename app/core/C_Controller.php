<?php 
namespace app\core;
use system\core\Controller;
// use system\core\Session;
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
		session_start();
		if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
			redirect('common/login');
		}
		$this->setMenu();
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
				$menuSonData = $this->_model->select('menu', ['pid', 'url', 'name'], ['status' => 1, 'id' => $menuId])[0];
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