<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
</head>
<body>
	<img src="{{ asset('img/logo/logo.png') }}">
	<h1>Hello {{ $person }}</h1>
	<span>
		<!-- Your question {{ $question }} have been answered you can see it -->
		Здравствуйте! Доктор Брезицкий Юрий Иосифович ответил на ваш вопрос, ознакомьтесь с ответом по ссылке : 
		<a href="{{ url('/QA/getlist/question/' . $id ) }}"> {{ url('/QA/getlist/question/' . $id ) }} </a>
	</span>
	<p>With Regards from DocUrolog</p>
</body>
</html>