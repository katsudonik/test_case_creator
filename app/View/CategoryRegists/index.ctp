<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>

<script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/js/utility.js"></script>
<script type="text/javascript" src="/js/categoryRegist.js"></script>
<script type="text/javascript">
/*
$(document).ready(function(){
	$('.TestType a').style.display='none';
});
*/
$(function(){
	//新規パターン入力
	$(document).on("click", ".add", function(){
		$table = $(this).parents('form').find('.target');
		add($table);
	});
	//削除
	$(document).on("click", ".delete", function(){
		url = $(this).parents('form').attr('action');
		deleteDatas(url);
	});
	//新規パターン登録
	$(document).on("click", ".sw", function(){
		$form = $(this).parents('form');
		var registPattern = $form.attr('class');
		regist($form, registPattern);
	});

	$(document).on("change", '.radio', function(){
		var selectedPattern = $(this).parents('form').attr('class');
		var id = $( this ).val();
		if(selectedPattern == 'Interfaces'){
			//選択時パターン取得処理
			patternsDetailDisplay(selectedPattern, id);
		}else if(selectedPattern == 'TestType'){
			//選択時パターン取得処理
			patternsDetailDisplay(selectedPattern, id);
		}else if(selectedPattern == 'TestPattern'){
			//選択時パターン取得処理
			getProcess(selectedPattern, id);
		}else{
			//選択時テスト詳細取得処理
			return false;
		}
	});
});


</script>
</head>
<body>
<form action="/CategoryRegists/delete/">
<input type="button" class="delete"/>
</form>
<?php
if(isset($categoryData)){
	foreach($categoryData as $categoryName => $category){
?>
	<div id="<?=$categoryName ?>">
	<?=$categoryName ?>
			<form action="/CategoryRegists/regist/type:<?=$categoryName ?>" class="<?=$categoryName ?>">
				<table class="target">
		<?php
			if($categoryName == 'Interfaces'){
				foreach($category as $id => $name){
		 ?>
					<tr><td><input type="radio" name="select" class="radio" value="<?=$id ?>"><?=$name ?></td></tr>
		<?php
				 }//for $category
			}//end if
		?>
				</table>
		<?php
			if($categoryName == 'Interfaces'){ ?>
				<a href="javascript: void(0)" class="add">+</a>
		<?php
			}else{
		?>
				<a href="javascript: void(0)" class="add" style="display:none">+</a>
		<?php
			}
		?>
			</form>
	</div>
<?php
	}//for $categoryData
}//endif
?>
<div id="process" style="display:none">
	<input type="text" name="">

</div>
<div id ="err"></div>
	</body>
</html>