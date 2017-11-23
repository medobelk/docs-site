<?php $this->extend('Admin/layout'); ?>

	<div class="hr"></div>
        <form method="post" id="login-form" action="<?php echo Route::buildURL("Admin", "Login"); ?>">
		<label>Логин:</label><input type="text" name="user_name" value=""><br><br>
		<label>Пароль:</label><input type="password" name="password" value=""><br><br>
		<label></label><input type="submit" value="Войти">
	</form><br />