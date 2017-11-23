<?php $this->extend('Admin/layout'); ?>

<h2>Не отвеченные</h2>
<?php //var_dump($this->HasNotAnswer); ?>
<?php
//var_dump($this->HasNotAnswer);
foreach ($this->HasNotAnswer as $item){
?>
<p><b>Имя</b><?php echo $item['name'];?><br />
<?php echo $item['text'];?><br />
<a href = '<?php echo Route::buildURL("Admin", "addAnswer", array('id'=>$item['id'])); ?>'>Ответить </a>
<a href = '<?php echo Route::buildURL("Admin", "delQuestion", array('id'=>$item['id'])); ?>'>Удалить</a>
</p>
 <? } ?>
 <br />

<h2>Отвеченные</h2>
<?php
//var_dump($this->HasAnswer);
foreach ($this->HasAnswer as $item){
?>
<p><b>Имя</b><?php echo $item['name'];?><br />
<?php echo $item['text'];?><br />
<a href = '<?php echo Route::buildURL("Admin", "editAnswer", array('id'=>$item['id'])); ?>'>Редактировать </a>
<a href = '<?php echo Route::buildURL("Admin", "delQuestion", array('id'=>$item['id'])); ?>'>Удалить</a>
</p>
 <? } ?>
