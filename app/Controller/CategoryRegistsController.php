<?php
App::uses('Interfaces',' Model');
App::uses('TestType',' Model');
App::uses('TestPattern',' Model');
/**
 * テスト分類を管理するコントローラークラス
 * @author maccyakatsudon
 *
 */
class CategoryRegistsController extends AppController {
	var $helpers = array('Html', 'Form', 'Js');

	public $uses = array(
		'Interfaces',
		'TestType',
		'TestPattern',
		'TestCase',
	);


	private static $SUCCESS = '0000';

	function beforeFilter(){
		$this->layout = false;
	}

	/**
	 * 画面表示
	 * @abstract index
	 */
	public function index() {
		$categoryData = $this->getInterfaces();
		$categoryData['TestType'] = array();
		$categoryData['TestPattern'] = array();
		$this->set('categoryData',$categoryData);
	}

	/**
	 *
	 */
	public function regist() {
		TestCreaterLog::debug("----------------start----------------");
		TestCreaterLog::debug('request->named->', $this->request->named);
		if(empty($this->request->named)){
			throw new TestCreaterException('登録先指定がありません.');
		}
		$type = $this->request->named['type'];

		TestCreaterLog::debug('request->data->',$this->request->data);
		if(empty($this->request->data)){
			throw new TestCreaterException('リクエストデータがありません.');
		}
		$data = $this->request->data;

		//登録先テーブル定義
		TestCreaterLog::debug('uses->', $this->uses);
		if(in_array($type, $this->uses)){
			if(!$tableInstance = ClassRegistry::init($type)){
				throw new TestCreaterException('テーブル指定不正.:exists_tables->'.print_r($this->uses,true).'\n'.'table->'.$type);
			}
		}else{
			throw new TestCreaterException('テーブル指定不正.table->'.$type);
		}

		$name = Fields::getValue($data, 'name');
		if($name == null or $name ===''){
			throw new TestCreaterException('IF不整合:未入力エラー. --key->name --data->'.print_r($data, true));
		}
		if($type != 'Interfaces'){
			$parentId = Fields::getValue($data, 'parent_id');
			if($parentId == null or $parentId ===''){
				throw new TestCreaterException('IF不整合:未入力エラー. --key->parent_id --data->'.print_r($data, true));
			}
		}
		//データ登録
/*
		foreach($names as $key => $name){
			$tableInstance->create(false);
			if(!$tableInstance->save(array('name' => $name))){
				throw new TestCreaterException('登録不正.');
			}else{
				TestCreaterLog::debug('登録完了:name->'.print_r($name,true));
			}
		}
*/
		$saveData['name'] = $name;
		if($type != 'Interfaces' && isset($parentId)){
			$saveData['parent_id'] = $parentId;
		}
		TestCreaterLog::debug('saveData->', $saveData);
		$tableInstance->create(false);
		if(!$tableInstance->save($saveData)){
			throw new TestCreaterException('登録不正.');
		}else{
			TestCreaterLog::debug("登録完了");
		}
		$lastId = $tableInstance->getLastInsertID();
		$datas = array(
				'id' => $lastId,
				'name' => $name,
				);
		$result = array(
				'resultCd'=>'0000',
				'datas' => $datas,
				);
		$this->jsonOut($result);
	}

	/**
	 * 登録データ取得処理
	 */
	public function getPatternsData(){
		TestCreaterLog::debug('request->named->', $this->request->named);
		if(empty($this->request->named)){
			throw new TestCreaterException('登録先指定がありません.');
		}
		$type = $this->request->named['type'];
		TestCreaterLog::debug('uses->', $this->uses);
		if(in_array($type, $this->uses)){
			if(!$tableInstance = ClassRegistry::init($type)){
				throw new TestCreaterException('テーブル指定不正.:exists_tables->'.print_r($this->uses,true).'\n'.'table->'.$type);
			}
		}else{
			throw new TestCreaterException('テーブル指定不正.table->'.$type);
		}

		if(empty($this->request->data)){
			throw new TestCreaterException('データ指定がありません.');
		}
		TestCreaterLog::debug('requestData->',$this->request->data);
		$id = $this->request->data['id'];
		$params =array(
				'conditions' =>array(
						'parent_id'=>$id
				)
		);
		TestCreaterLog::debug('params->',$params);
		$datas = $tableInstance->find('all', $params);
		TestCreaterLog::debug('datas->',$datas);
		if(!empty($datas)){
			foreach($datas as $record){
				$datas[] = $record[$type];
			}
		}
		$result = array(
				'resultCd'=>'0000',
				'datas' => $datas,
		);
		$this->jsonOut($result);
	}

	/**
	 * テストパターン詳細データ取得処理
	 */
	public function getTestPatternsDetail(){



		$datas['TestPattern'] = $this->TestPattern->find('list');
		return $datas;
	}

	public function delete(){
		//TestCreaterLog::debug('start-------------------------------');

		if(!$this->Interfaces->deleteAll(array('id' > 1), false)){
			throw new TestCreaterException('削除できませんでした.');
		}
		$result = array('resultCd'=>'0000');
		$this->jsonOut($result);
	}

	/**
	 * xml入出力
	 */
	public function export() {

	}


	/**
	 * 登録データ取得処理
	 */
	private function getInterfaces(){
		$datas['Interfaces'] = $this->Interfaces->find('list');
		TestCreaterLog::debug('datas->',$datas);
		return $datas;
	}

	/**
	 * Jsonで出力する
	 *
	 * @return 処理結果（JSON形式）
	 */
	private function jsonOut($result) {
		TestCreaterLog::debug("----------------end----------------");
		TestCreaterLog::debug(print_r($result,true));
		// JSON形式で結果を返す
		$this->viewClass = 'Json';
		$this->set(compact('result'));
		$this->set('_serialize', 'result');
	}
}