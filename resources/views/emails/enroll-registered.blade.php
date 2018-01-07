<!DOCTYPE html>
<html>
<head>
	<title>Новая Запись</title>
</head>
<body>

	<h1>Новая Запись</h1>
	<p><b>{{ $visit->name }}</b> создал новую заявку на Вашем сайте в @php $date = new DateTime($visit->created_at); echo $date->format('d.m.Y'); @endphp</p>
	<p>Данные</p>
	<p>Номер: {{ $visit->phone }}</p>
	<p>Почта: {{ $visit->email }}</p>
	<p>Жалобы:</p>
	<span>{{ $visit->complaints }}</span>
</body>
</html>