<?php 
namespace app\Controller;

use system\core\Controller;
use app\model\SectionModel;
/**
 * 默认控制器(测试)
 */
class SectorController extends Controller
{
	public $section;

	public function __construct()
	{
		$this->section = new SectionModel();
	}
	public function index()
	{
		$sectionData = $this->section->select('section', '*');

		// dump($sectionData);
		view('sector/index', ['sectionData' => $sectionData]);
	}

	public function add()
	{

		if(get('name')) {
			$insData = [
				'name' => get('name'),
				'create_time' => time(),
				'last_edit_time' => time(),
				'last_edit_uid' => 1
			];

			$insId = $this->section->insert('section', $insData);
		}
		view('sector/index');
	}
}