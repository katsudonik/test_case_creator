<?php /* $id:$ */ ?>
			<script type="text/javascript" src="/js/check_enable.js" charset="utf-8"></script>
			<!-- Contents -->
			<div id="ContentsContainer">
				<div id="ContentsInner">
					<h1><img src="/images/tokuten_midashi.gif" alt="特典申し込みページ" width="920" height="40"></h1>
					<p class="shoukai_txt">ご紹介者の情報を入力して特典申し込みを行ってください。<br>
						事前にキャンペーンの応募条件や注意事項をご確認の上ご利用ください。</p>
					<div class="loginInfo"></div>
					<p class="campaign_btn"><a href="/index.html" target="_blank"><img src="/images/canpaign_btn.gif" alt="キャンペーン詳細はこちら" width="310" height="50" border="0"></a></p>
					<div id="contentsMain">
						<div class="section">
							<div class="box">
							<!-- TF 実装パート開始 -->
								<h2><img src="/images/tokuten_midasi02.gif" alt="

								" width="920" height="62"><?php echo ($test); if(isset($test) && $test!=""){
									echo ($test);
								} ?></h2>
								<?php echo $this->Form->create('privilegeApplication', array('controller' => 'privilege_applications','action'=>'complete',"name"=>"frm", 'novalidate' => true));?>
									<h3><img src="/images/tokuten_midasi03.gif" alt="紹介者情報入力" width="880" height="30"></h3>
									<?php if (isset($err_msg)){ ?>
									<p class="error">
									<?php if(is_array($err_msg)) {
										foreach ($err_msg as $key => $values) {
											foreach ($values as $value) {
												echo $value;
											}
										}
									}else{
										echo $err_msg;
									} ?>
									</p> <?php } ?>
									<dl>
										<dt>
											<label for="privilegeApplicationName">ご紹介者(紹介元)氏名(カナ)</label>
										</dt>
										<dd>
											<?php echo $this->Form->input('name', array('label'=> false,'type' => 'text','class' => 'txtbox','size' => '10','div' => false,'error' => false)); ?><br>
											※全角カナで入力してください。
										</dd>
										<dt>
											<label for="privilegeApplicationTel">ご紹介者（紹介元）の情報入力</label>
										</dt>
										<dd class="bottom">
											<?php $tel1=array('080' => '080','090' => '090','070' => '070');
												echo $this->Form->input('tel',array('label'=> false, 'type' => 'select', 'options' => $tel1, 'class' => 'selectbox', 'size' => false, 'div' => false, 'error' => false)); ?>
											- <?php echo $this->Form->input('tel2', array('label'=> false,'type' => 'text','class' => 'txtbox3','size' => false,'div' => false,'error' => false,'maxlength'=>'4')); ?>
											- <?php echo $this->Form->input('tel3', array('label'=> false,'type' => 'text','class' => 'txtbox3','size' => false,'div' => false,'error' => false,'maxlength'=>'4')); ?><br>
											※半角数字で入力してください。
										</dd>
									</dl>
									<h3><img src="/images/tokuten_midasi04.gif" alt="ご自身（紹介先）の情報入力" width="880" height="30"></h3>
									<p class="txt">申し込み完了通知を受け取る場合はメールアドレスを入力して下さい</p>
									<dl>
										<dt>
											<label for="contact_mail">メールアドレス</label>
										</dt>
										<dd>
											<?php echo $this->Form->input('contact_mail', array('id' => 'contact_mail', 'label'=> false,'type' => 'text','class' => 'txtbox2','size' => '10','div' => false,"onChange"=>"lf_kakunin();",'error' => false)); ?> @ <?php echo $this->Form->input('contact_mail_domain', array('id' => 'contact_mail_domain','label'=> false,'type' => 'text','class' => 'txtbox2','size' => false,"onChange"=>"lf_kakunin();",'div' => false, 'error' => false)); ?><br>
											※半角英数記号で入力してください。
										</dd>
										<dt>
											<label for="mail_confirm">確認</label>
										</dt>
										<dd>
											<?php echo $this->Form->input('mail_confirm', array('id' => 'mail_confirm','label'=> false,'type' => 'text','class' => 'txtbox2','size' => '10','div' => false,"onChange"=>"lf_kakunin();",'error' => false)); ?> @ <?php echo $this->Form->input('mail_confirm_domain', array('id' => 'mail_confirm_domain','label'=> false,'type' => 'text','class'=>'txtbox2','size' => false,'div' => false,"onChange"=>"lf_kakunin();",'error' => false)); ?><br>
											※半角英数記号で入力してください。
										</dd>
									</dl>
									<p class="txt">
										<?php echo $this->Form->input('recept', array('id'=>'recept','type'=>'checkbox','label'=>false,'disabled'=>'disabled','div' => false,'error' => false)) ?> 今後イー・モバイルからのお知らせ等を受け取る
									</p>
									<dl class="info_area">
										<dt>■特典対象・適用条件</dt>
										<dd>・特典対象・適用条件についてはこちらをご確認ください。</dd>
										<dt>■特典について</dt>
										<dd>・紹介先のお客さまの新規ご契約に対し、紹介元/紹介先となるお客さまへ商品券3,000円分をそれぞれにお送り致します。<br>
											・特典の発送は、紹介先のキャンペーン申し込み月の翌々月末までに、ご契約先住所へ発送させていただきます。ご契約先住所へ発送したにも関わらず、弊社へ返送となった場合、特典の権利を無効といたします。<br>
											・特典付与のご連絡は発送をもって代えさせていただきます。
										</dd>
										<dt>■下記に該当する場合、特典の適用対象外となりますのでご注意ください</dt>
										<dd>・紹介元、紹介先が法人名義の場合<br>
											・紹介元と紹介先が同一回線の場合<br>
											・既に紹介されているお客さまが再度紹介された場合<br>
											・入力された紹介元情報に誤りがあった場合<br>
											・紹介元の契約日より前に紹介先が契約されている場合<br>
											・商品券発送時点で、<br>
											　①紹介元、紹介先のいずれかがご解約されている場合<br>
											　②紹介元、紹介先のいずれかのご利用料金のお支払いの事実を 当社が確認出来ない場合<br>　③紹介元、紹介先のいずれかが機種変更、契約変更、電話番号変更された場合または、キャンペーン適用条件外の対象プランへ変更されている場合<br>
											　④発送先住所が転居、連絡不要などの理由により不明な場合
										</dd>
									</dl>
									<p class="txt red">申し込み後の入力情報の変更はできません。事前によくご確認の上、申し込みください<br>専用オンラインストアですでに特典申し込み済みの方はこのページからの申し込みは無効となります</p>
									<p class="btn"><?php echo $this->Form->submit('送信', array('type'=>'image', 'src'=>'/images/sousin_btn.gif', 'width'=>'376', 'height'=>'56', 'alt'=>'送信')); ?></p>
								</form>
							<!--// TF 実装パート終了 -->
							</div>
						</div>
					</div>
					<!-- /.contentsMain -->
					<div class="contentsSub">
						<div class="section"> </div>
					</div>
					<!-- /.contentsSub -->
				</div>
				<!-- /.ContentsInner -->
			</div>
			<!-- /Contents -->