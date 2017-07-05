<?php
class TestCreaterException extends CakeException {

	public function __construct($message = null, $code = 0) {
		if (empty($message)) {
			$message = 'Application Error';
		}
		$bt = debug_backtrace();
		TestCreaterLog::debug($message.'\n'.$bt[0]['file'].'('.$bt[0]['line'].')');
		parent::__construct($message, $code);
	}
}