<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div>
			Eメール、Facebookメッセージ、チケット印刷の3つの方法で紹介が可能です。<br>
			必要事項を入力し、確認ボタンをクリックすると招待メッセージが生成されます。<br>
			事前にキャンペーンの応募条件や注意事項をご確認の上ご利用ください。
			<?php echo $this->Login->loginInfo(); ?>
			<?php echo $this->Form->button("キャンペン詳細はこちら",array("onClick"=>"location.href=''","type"=>'button')) ;  ?>
		</div>

		<h2>facebookの友達に紹介する</h2>
		<h3>メッセージ内容確認</h3>

		紹介者のお名前 <?php echo $name; ?><br>
		紹介する友達 <?php if(isset($select_friend)){
								foreach($select_friend as $key => $value){ ?>
									<img src="https://graph.facebook.com/<?php echo $key; ?>/picture?width=150&height=150" alt="" />
									<?php echo $value;
								}
							}?>
		<br>
		メッセージ内容 <br>
		<?php $fb_msg=$this->element('fb_msg');
		echo $fb_msg; ?>

		<?php	echo $this->Form->create(false, array('type'=>'post','action'=>'send_msg','class'=>'send_msg'));
				echo $this->Form->input('fb_msg', array(
					'type' => 'hidden',
					'class' => 'fb_msg',
					'value' => $fb_msg,
					'div' => false
				));
				echo $this->Form->submit('送信');
				echo $this->Form->end();
				echo $this->Form->create(false, array('type'=>'post','action'=>'index','class'=>'back'));
				echo $this->Form->submit('戻る');
				echo $this->Form->end(); ?>
	</body>
</html>