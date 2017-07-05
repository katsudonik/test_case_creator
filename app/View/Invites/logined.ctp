<html>
<head>
<title>sample1</title>
</head>
	<body>
	2秒後にメッセージ入力画面へリダイレクトし、この画面が閉じます。
			<SCRIPT language="JavaScript">
				window.opener.document.forms['test'].submit();
				setTimeout("window.close()", 1000 * 2 );// 閉じる時間の設定
			</SCRIPT>
	</body>
</html>