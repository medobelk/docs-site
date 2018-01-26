<!DOCTYPE html>
<html lang="ru">
  <head>
    
    @yield('title')
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>
    @include('layouts.styles')
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5RT7PST');</script>
    <!-- End Google Tag Manager -->
    <script src='https://www.google.com/recaptcha/api.js?hl=ru'></script>
  </head>
  <body class="page">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5RT7PST"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  
    <!-- Google Code for call1 Conversion Page In your html page, add the snippet and call goog_report_conversion when someone clicks on the phone number link or button. --> 
    <script type="text/javascript"> /* <![CDATA[ */ goog_snippet_vars = function() { var w = window; w.google_conversion_id = 972686283; 
    w.google_conversion_label = "Z7oaCNa9kXsQy4fozwM"; w.google_remarketing_only = false; } // DO NOT CHANGE THE CODE BELOW. 
    goog_report_conversion = function(url) { goog_snippet_vars(); window.google_conversion_format = "3"; 
    var opt = new Object(); opt.onload_callback = function() { if (typeof(url) != 'undefined') { window.location = url; } }; var conv_handler = window['google_trackConversion']; if (typeof(conv_handler) == 'function') { conv_handler(opt); } } /* ]]> */ </script> <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js"> </script> 

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
  @include('layouts.create-question-enroll-form-success')
  {{-- @include('layouts.enroll-dates-handler') --}}
  @yield('page-scripts')

  </body>
</html>