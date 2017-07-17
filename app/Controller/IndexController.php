<?php 
namespace app\Controller;

use system\core\Config;
use app\core\C_Controller;
/**
 * 默认控制器(测试)
 */
class IndexController extends C_Controller
{
	public function index()
	{

		// $model = new Model();
		// $res = $model->query('select * from user');

		// dump($res->fetchAll());
		// 
		// echo base_url();exit;
		view('index', ['title' => '测试标题', 'content' => '我是测试内容啊喂']);
	}

	public function login()
	{
		echo 222;exit;
	}
}