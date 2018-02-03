<!DOCTYPE html>
<html lang="ru">
  <head>
    
    @yield('title')
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-cabinet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/compiled.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.css">
    
  </head>
  <body class="page">
        
      <header class="section">
        <div class="container">
          <div class="columns" style="justify-content: center;">
            <div class="column is-2 has-text-centered">
              <a class="logo" href="{{ url('/') }}"><b class="logo-left">doc</b><b class="logo-right">Urolog</b></a>
            </div>
            <div class="column nav is-4 has-text-right" >
              
            </div>
          </div>
        </div>
      </header>

      <section class="section content-section">
        <div class="container">
          <div class="block" >
            <div class="columns" style="justify-content: center;">
              <div class="column is-1"></div>
              <div class="column is-5">

                <form enctype="multipart/form-data" class="main-content__adding-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="info-block">
                  <p class="info-block-title">E-Mail Адрес</p>
                  <input class="input-field" type="email" name="email" value="{{ old('email') }}" required autofocus/>
                </div>

                <div class="info-block">
                  <p class="info-block-title">Пароль</p>
                  <input class="input-field" id="password" name="password" required="" type="password" />
                </div>

                <div class="info-block">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить Меня
                  </label>
                </div>

                <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="логин"/>
                
                {{--<div class="info-block rd-links">
                  <label>
                    <a class="" href="{{ route('password.request') }}">
                      Забыли Пароль?
                    </a>
                  </label>
                </div>--}}

                </form>
              </div>
            </div>
          </div>
          <!-- <div class="sidebar"></div> -->
        </div>
      </section>
      
      <footer class="section">
        <div class="container is-clearfix" style="width: 50%; color: white;">
          <span class="is-pulled-left">2017 © docurolog</span>
          <span class="is-pulled-right">дизайн и поддержка сайта <img class="footer-ico" src="{{asset('img/foot-ico.png')}}"> <a>Katrin Briz</a></span>
        </div>
      </footer>

    @include('layouts.scripts')
    @include('layouts.google-analytics')
    @include('layouts.form-errors-script')
    @include('layouts.enroll-dates-handler')
    @yield('page-scripts')

  </body>
</html>