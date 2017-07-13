<?php 
namespace app\Controller;
use app\core\C_Controller;

/**
 * 默认控制器(测试)
 */
class SkipController extends C_Controller
{
	public function index()
	{

		view('skip');
	}
}