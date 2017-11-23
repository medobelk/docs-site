<?php 
	$this->extend("main");
    $this->moreStyles = '';
	$this->title='Последние ответы';
?>
				<h2>Последние ответы</h2> 
<? foreach ($this->list as $variable) {?>
				<a class="q-link" href="<?=Route::buildURL('QA', 'view', array('id'=>$variable->id));?>">
				<span class="hl"><? echo $variable-> name ?>  <? echo russian_date($variable->date);?></span><br>
				<? echo $variable-> text ?></a> 
<?}?>
