<?php
/**
 * �e�X�g���ނ�o�^����R���g���[���[�N���X
 * @author maccyakatsudon
 *
 */
class TestsController extends AppController {
	public $helpers = array('Form', 'Html');

	/**
	 * ��ʕ\��
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