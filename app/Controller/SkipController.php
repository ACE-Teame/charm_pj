<?php 
namespace app\Controller;
use system\core\Model;
use system\core\Controller;

/**
 * 默认控制器(测试)
 */
class SkipController extends Controller
{
	public function index()
	{

		view('skip');
	}
}