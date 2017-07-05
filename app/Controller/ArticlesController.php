<?php
class ArticlesController extends AppController {
	public $helpers = array('Form', 'Html');

	public function index($short = null) {

		$test="Articles";
		if(isset($test) && $test!=""){
			$this->set('title', $test);
			echo __LINE__.$test;
		}

/*

		if (!empty($this->request->data)) {
			$this->Article->save($this->request->data);
		}
		if (!empty($short)) {
			$result = $this->Article->findAll(null, array('id', 'title'));
		} else {
			$result = $this->Article->findAll();
		}

		if (isset($this->params['requested'])) {
			return $result;
		}

		$this->set('title', 'Articles');
		$this->set('articles', $result);

	*/	}
}
?>