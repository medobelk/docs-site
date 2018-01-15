<!DOCTYPE html>
<html lang="ru">
  <head>
    
    <title>Врач-уролог Брезицкий Юрий Иосифович</title>
    
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>
    @include('layouts.styles')

  </head>
  <body class="page">
    
    <div class="page__wrap">
        
      @include('patient_cabinet.header')

      <div class="test-block">
      </div>
      
      @yield('content')
      
      @include('patient_cabinet.footer')
    </div>

  	@include('layouts.scripts')
    @include('layouts.form-errors-script')
    @include('layouts.enroll-dates-handler')
  </body>
</html>