<?php 
namespace app\Controller;
use app\core\C_Controller;

/**
 * 默认控制器(测试)
 */
class LinkController extends C_Controller
{
	public function skip()
	{
		view('link/skip');
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