<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Wox-landing</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>

		@include('layouts.styles')

	</head>
	<body class="page">
		<div class="page__wrap">

		@include('layouts.form-header')
		
		@yield('content')
      
      	@include('layouts.form-footer')

		</div>
	
		@include('layouts.scripts')
		@include('layouts.google-analytics')

	</body>
</html>