<?php 
namespace app\Controller;
use system\core\Model;
use system\core\Controller;

/**
 * 默认控制器(测试)
 */
class LinkController extends Controller
{
	public function skip()
	{
		view('Link/skip');
	}

	public function link()
	{
		view('Link/link');
	}
	public function linkEdit()
	{
		view('Link/link-edit');
	}
}