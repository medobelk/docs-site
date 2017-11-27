<!DOCTYPE html>
<html lang="ru">
  <head>
    
    <title>No-name</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>
    @include('layouts.styles')

  </head>
  <body class="page">
    <div class="page__wrap">
        
      @include('layouts.header')

      <div class="test-block">
      </div>
      
      @yield('content')
      
      @include('layouts.footer')
    </div>

	@include('layouts.scripts')
  @include('layouts.google-analytics')
  @include('layouts.form-errors-script')
  @include('layouts.create-question-form-success')

  </body>
</html>