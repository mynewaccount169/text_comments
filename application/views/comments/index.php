<style>

</style>
	<h1>

</h1>
<div class="container">

	<script id="clientEventHandlersJS" language="javascript">
        function memo_onkeydown()
        {
            var s,c;
            s=exampleFormControlTextarea1.value;
            c = 1000 - s.length;
            countlabel.innerText="Осталось : " + c;

        }
	</script>
	<span id="success_message"></span>
	<form id="contact_form" action="" method="post">
		<div class="row">

		<div class="col">
			<label for="exampleFormControlInput1">введите ваш комментарий</label>
			<input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
			<span id="email_error" class="text-danger"></span>
		</div>

		<div class="col">
			<br />
			<label for="exampleFormControlInput1"></label>

			<input type="text" id="fio" name="fio" class="form-control" placeholder="ФИО/НИК">
			<span id="fio_error" class="text-danger"></span>
		</div>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1"></label>
			<textarea  onkeyup="memo_onkeydown()" name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="комментарий (не более 1000 символов)"></textarea>
			<span id="text_error" class="text-danger"></span>
		</div><p id="countlabel">Осталось : 1000 символов</p>
		<button name="add_record" type="submit" id="addToBase" class="btn btn-primary">отправить</button>
	</form>
	<?php	if($comments) {
	foreach ($comments as $key => $value):?>
	<hr>
	<div class="comment">
		<div class="head">
			<small><strong class='user'><?php if (empty($value['fio'])) {
						echo stristr($value['email'], '@', true);
					} else {
						echo $value['fio'];
					}
					?></strong> <?=date('Y-m-d в H:i',$value['begin_date'])?></small>
		</div>
	</div><p><?=$value['text']?></p>
		<?php	endforeach;
	}else{
		echo 'комментариев нет';
	}
	?><hr>
				<?php if (isset($links)) { ?>
					<?php echo $links; ?>
				<?php } ?>

	<script>
		var path_add = '<?=site_url()?>';
	</script>

