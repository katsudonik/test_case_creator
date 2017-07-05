<?php
App::uses('AppModel', 'Model');

class Csv extends AppModel {
	public $actsAs = array( 'CsvImport' );
	var $useTable='csv';
}