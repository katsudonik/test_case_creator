<html>
<?php
$array=array(
		0=>'a',
		1=>'b'
);
//�z���JSON�`���istring�j�ɕϊ�
$json_str = json_encode($array);
?>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
//json��������擾
var jsonText='<?=$json_str?>';
$(function(){
	$(document).ready(function() {
		//JSON�������js�̔z��ɕϊ�
		var jsonArray = $.parseJSON(jsonText);
		//�z��v�f���̏������s
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