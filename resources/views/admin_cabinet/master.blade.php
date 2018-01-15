<!DOCTYPE html>
<html lang="ru">
  <head>

    <title>Врач-уролог Брезицкий Юрий Иосифович</title>
    
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>
    @include('layouts.styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css "> -->

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