<html>
<?php
$array=array(
		0=>'a',
		1=>'b'
);
//配列をJSON形式（string）に変換
$json_str = json_encode($array);
?>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
//json文字列を取得
var jsonText='<?=$json_str?>';
$(function(){
	$(document).ready(function() {
		//JSON文字列をjsの配列に変換
		var jsonArray = $.parseJSON(jsonText);
		//配列要素分の処理実行
		for(i=0; i < jsonArray.length; i++){
			test(jsonArray[i]);
		}
	});
});
	function test(str){
		alert(str);
	}
</script>
</head>
<body>
		<?php var_dump($array);?>
</body>
</html>