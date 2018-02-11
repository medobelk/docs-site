<!DOCTYPE html>
<html>
<head>
	<title>Запись</title>
</head>
<body>
	<img src="{{ asset('img/logo/logo.png') }}">
	<h1>Здравствуйте {{ $visit->name }}</h1>
	<span>
		Вы записаны на прием доктора Брезицкиго Юрия Иосифовича на {{ date('d-m-Y', strtotime($visit->visit_date) ) }} в {{ date('H', strtotime($visit->visit_date) ) }} часов. 
	</span>
</body>
</html>