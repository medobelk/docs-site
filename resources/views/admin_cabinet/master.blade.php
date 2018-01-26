<!DOCTYPE html>
<html lang="ru">
  <head>

    <title>Врач-уролог Брезицкий Юрий Иосифович</title>
    
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-cabinet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/compiled.css') }}">

  </head>
  <body class="page">
    
    <div class="page__wrap">
        
      @include('admin_cabinet.header')

      <div class="test-block">
      </div>
      
      @yield('content')
      
      @include('admin_cabinet.footer')
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script> -->
  	@include('layouts.scripts')
    @include('layouts.form-errors-script')
    @include('admin_cabinet.search-script')
    @yield('page-scripts')
  </body>
</html>