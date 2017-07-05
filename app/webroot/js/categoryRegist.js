/**
 * 新規パターン入力フォーム生成
 * @param $table
 */
function add($table){
	$($table).append('<tr><td><input type="text" name="addData" class="parameter"><a href="javascript: void(0)" class ="sw" onClick="categoryRegist();">登録</a></td></tr>');
}

/**
 * 新規パターン登録
 * @param url
 * @param $form
 * @param $children
 */
function regist($form, registPattern){
	$display = $('#err');

	var parentId = '';
	if(registPattern == 'TestType'){
		$parentForm = $('.Interfaces');
		parentId = $parentForm.find('input:checked').val();
	}else if(registPattern == 'TestPattern'){
		$parentForm = $('.TestType');
		parentId = $parentForm.find('input:checked').val();
	}

	var url = $form.attr('action');
	$children = $form.find('.parameter');
	$table = $form.find('.target');
	$tr = $form.find('.target tr:last');
	var registPattern = $table.attr('name');

	var name;
	var data = new Array();
	var postData = new Array();
	$children.each(function(index, text) {
		name = $(text).val();
	});
	postData={
		'parent_id':parentId,
		'name':name
	};

	$.ajax({
        type : 'post',
        url     : url,
        data : postData,
        dataType: "json",
        success: function(data, textStatus, jqXHR){
        	if(array_key_exists ( 'resultCd', data ) == true){
        		if(data['resultCd'] == '0000'){
        			$($tr).fadeOut( 100, function(){$(this).remove();} );
        			var datas = data['datas'];
        			var id = datas['id'];
        			var name = datas['name'];
        			if(name != null){
            			$($table).append('<tr><td><input type="radio" name="select" class="radio" value="' + id + '">' + name + '</td></tr>');
            			console.log('success');
        			}
        		}
        	}
        },
		error: function(xhr, textStatus, errorThrown){
			$display.html(arguments[0]['responseText']);
		}
    });
}

/**
 * ラジオボタン選択時の該当パターン表示
 * @param selectedPattern
 * @param id
 */
function patternsDetailDisplay(selectedPattern, id){
	$display = $('#err');
	if(selectedPattern == 'Interfaces'){
		$toTable = $('.TestType .target');
		var type = 'TestType';
		$('.TestPattern a').hide();
    	$addButton = $('.TestType a');
    	$testPatternTable = $('.TestPattern .target');
    	$deleteTable = [$toTable, $testPatternTable];
	}else if(selectedPattern == 'TestType'){
		$toTable = $('.TestPattern .target');
		var type = 'TestPattern';
    	$addButton = $('.TestPattern a');
    	$deleteTable = [$toTable];
	}else{
		return false;
	}

	url = '/CategoryRegists/getPatternsData/type:' + type;
	postData={
			'id':id
	};
	$.ajax({
        type : 'post',
        url     : url,
        data : postData,
        dataType: "json",
        success: function(data, textStatus, jqXHR){
        	if(array_key_exists ( 'resultCd', data ) == true){
        		if(data['resultCd'] == '0000'){
        			if($toTable != null){
            			if($deleteTable != null){
            				for(i = 0; i <$deleteTable.length; i++){
            					$($deleteTable[i]).empty();
            				}
            			}
            			var datas = data['datas'];
        				for(i = 0; i < datas.length; i++){
		           			var id = datas[i]['id'];
	            			var name = datas[i]['name'];
	            			if(name != null){
								$($toTable).append('<tr><td><input type="radio" name="select" class="radio" value="'+ id +'">' + name + '</td></tr>');
	            			}
						}
        			}
						$($addButton).show();
        		}
        	}
        },
		error: function(xhr, textStatus, errorThrown){
			$display.html(arguments[0]['responseText']);
		}
    });
}

/**
 * データ削除
 * @param url
 */
function deleteDatas(url){
	postData={
			'dumy':'a'
	};
	$.ajax({
        type : 'post',
        url     : url,
        data : postData,
        dataType: "json",
        success: function(data, textStatus, jqXHR){
        	if(array_key_exists ( 'resultCd', data ) == true){
        		if(data['resultCd'] == '0000'){
					alert('ok');
        		}
        	}
        },
		error: function(xhr, textStatus, errorThrown){
			alert(errorThrown);
			alert(arguments[0]['responseText']);
		}
    });
}