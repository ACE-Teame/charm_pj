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
	public function index()
	{
		view('domain/index');
	}

}