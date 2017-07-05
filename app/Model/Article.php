<?php
class Article extends AppModel {
	public function published($fields = null) {
		$params = array(
				'conditions' => array(
						$this->name . '.published' => 1
				),
				'fields' => $fields
		);

		return $this->find('all', $params);
	}
}
?>