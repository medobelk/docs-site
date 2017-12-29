<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
</head>
<body>
	<img src="{{ asset('img/logo/logo.png') }}">
	<h1>Регистрация</h1>
	<span>
		Здравствуйте {{ $user['name'] }}. Вы были автоматически зарегистрированы на сайте <a href="{{ url('/') }}">docurolog.od.ua</a>. Можете ознакомиться со своей историей болезни, 
			логин: {{ $user['name'] }}, 
			пароль: {{ $user['password'] }}.
		}
	</span>
	<p>With Regards from DocUrolog</p>
</body>
</html>