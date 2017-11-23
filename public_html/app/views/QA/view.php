<?php 
	$this->extend("main");
    $this->moreStyles = '';
	$this->title='Последние ответы';
?>
<span class="hl"><? echo $this -> Question ->name;?>  <? echo russian_date($this -> Question ->date);?></span><br>
				<? echo $this -> Question ->text;?>
<br><br>
<span class="hl">Ответ</span><br>		
<? echo $this -> Question ->getAnswer()->text;?>

<br />
<a  class="more" href = '<?=Route::buildURL('QA', 'getlist');?>'>вернуться</a>