<?php 
	$this->extend("main");
    $this->moreStyles = '';
	$this->title='Задать вопрос';
?>
				<h2>Последние ответы</h2> 
<? foreach ($this->list as $variable) {?>
				<a class="q-link" href="<?=Route::buildURL('QA', 'view', array('id'=>$variable->id));?>">
				<span class="hl"><? echo $variable-> name ?>  <? echo russian_date($variable->date);?></span><br>
				<? echo $variable-> text ?></a> 
<?}?>

				
				<a class="more" href="<?=Route::buildURL('QA', 'getlist');?>">Читать все</a>
				
				<h2>Задать свой вопрос</h2>
				<p style="color:green">
				   Вопрос успешно добавлен
				</p>

				<form method="POST" action="<?=Route::buildURL('QA', 'request');?>">
					<label>Имя</label><input type="text" name="name" value="" /><br />
					<label>Электронный адрес</label><input type="text" name="email" value="" /><br />
					<label>Суть проблемы</label><textarea name="text"></textarea><br />
					<label></label><input type="submit" class="subm" value="" /><br />
				</form>