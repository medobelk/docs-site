<!DOCTYPE html>
<html>
<head>
	<title>Enroll</title>
</head>
<body>

	<h1>Hello Doc. Somebody needs your HELP</h1>
	<p>The <b>{{ $visit->name }}</b> have been created a new enroll on your site at @php $date = new DateTime($visit->created_at); echo $date->format('l F Y'); @endphp</p>
	<p>Phone is: {{ $visit->phone }}</p>
	<p>Email is: {{ $visit->email }}</p>
	<p>The problem:</p>
	<span>{{ $visit->complaints }}</span>
	<p>With Love from yours site notification cem </p>
</body>
</html>