<?php
/**
 * テスト分類を登録するコントローラークラス
 * @author maccyakatsudon
 *
 */
class TestsController extends AppController {
	public $helpers = array('Form', 'Html');

	/**
	 * 画面表示
	 */
	public function index() {
		$urls = Router::url(array(
		"controller" => "examples",
		"action" => "index",
		$param
		), true);
		$this->set('urls',$urls);
	}
}