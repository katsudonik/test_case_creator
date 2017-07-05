<?php
class TestCreaterLog{

	public static function debug($message = null, $data = null) {
		if (!empty($message)) {
			$bt = debug_backtrace();
			if(is_array($data)){
				CakeLog::debug($printMessage = $bt[0]['file'].'('.$bt[0]['line'].'):'.$message.print_r($data,true));
			}else{
				CakeLog::debug($printMessage = $bt[0]['file'].'('.$bt[0]['line'].'):'.$message.$data);
			}
		}
	}
}