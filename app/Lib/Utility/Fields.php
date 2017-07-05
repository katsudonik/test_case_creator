<?php
class Fields{
	/**
	 *
	 * @param unknown $search
	 * @param unknown $key
	 * @param unknown $required
	 * @return Ambigous <NULL, unknown>
	 */
	public static function getValue($search, $key) {
		$data = null;
		if(is_array($search)){
			if(isset($search[$key])){
				//空文字、null、0を含む
				$data = $search[$key];
			}
		}
		return $data;
	}
}