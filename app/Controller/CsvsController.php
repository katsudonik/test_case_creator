<?php
class CsvsController extends AppController {
	public $helpers = array('Form', 'Html');

	public function index() {
	}
	public function import() {
		$modelClass = $this->modelClass;
		$this->$modelClass->importCSV( 'hoge.csv' );
		$this->redirect( array('action' => 'index') );
	}
	public function insert(){

		$this->redirect( array('action' => 'index') );
	}

}