<?php 
namespace app\Controller;
use system\core\Controller;
use app\core\C_Controller;
/**
 * 默认控制器
 */
class IndexController extends C_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('home');
	}
}