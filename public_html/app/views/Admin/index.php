<?php $this->extend('Admin/layout'); ?>
<a class="logout" href="<?php echo Route::buildURL("Admin", "logout"); ?>">[Выход]</a>
	
	<a href="<?php echo Route::buildURL("Admin", "index"); ?>">Главная</a> &gt;
	<div class="hr"></div>
	
	<div class="menu_line1">
		<a href="<?php echo Route::buildURL("Pages", "listm"); ?>">СТРАНИЦЫ</a> <a href="<?php echo Route::buildURL("Pages", "blank"); ?>" class="add">СОЗДАТЬ</a>
	</div>
	<div class="menu_line1">
		<a href="<?php echo Route::buildURL("Newses", "listm"); ?>">НОВОСТИ</a> <a href="<?php echo Route::buildURL("Newses", "blank"); ?>" class="add">СОЗДАТЬ</a>
	</div>
	<div class="menu_line1">
		<a href="<?php echo Route::buildURL("CatalogCategorys", "listm"); ?>">КАТЕГОРИИ КАТАЛОГА</a> <a href="#" class="add">СОЗДАТЬ</a>
	</div>
	<div class="menu_line1">
		<a href="<?php echo Route::buildURL("Banners", "listm"); ?>">БАННЕРЫ</a> <a href="#" class="add">СОЗДАТЬ</a>
	</div>
	<!--div class="menu_line1">
		<a href="<?php echo Route::buildURL("Menus", "listm"); ?>">МЕНЮ</a> <a href="#" class="add">СОЗДАТЬ</a>
	</div-->
        
        <div class="hr"></div>
        <a href="#" id="fm">Файловый менеждер</a>
        <div id="fm"></div>