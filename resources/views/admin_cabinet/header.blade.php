<header class="header-patient ">
  <div class="header-patient__container header__container">

      <div class="mobile-menu"><img class="mobile-menu__icon" src="{{ asset('img/mobile-burger.png') }}" alt="" role="presentation"/>
          <div class="mobile-menu__links hide">
              <div class="flex-block">
                  <div class="links-block">
                      <a class="header-nav__link mobile-menu__link" href="{{ url('/admin/') }}">Записать</a>
                      <a class="header-nav__link mobile-menu__link" href="{{ url('/admin/questions') }}">Вопросы</a>
                      <a class="header-nav__link mobile-menu__link" href="{{ url('/admin/reviews') }}">Отзывы</a>
                      <a class="header-nav__link mobile-menu__link" href="{{ url('/admin/calendar') }}">Прием</a>
                      <a class="header-nav__link mobile-menu__link" href="{{ url('/admin/enroll') }}">События</a>
                      <a class="header-nav__link mobile-menu__link" href="{{ url('/admin/patients') }}">Пациенты</a>
                  </div>
                  <div class="header__private-cabinet private-visible">
                      @if( Auth::guest() )
                          <a href="{{ route('login') }}" class="private-cabinet">
                              <img class="private-cabinet__icon" src="{{ asset('img/lock-ico.png') }}" alt="" role="presentation"/><i class="private-cabinet__text">Вход</i>
                          </a>
                      @else
                          <a href="{{ route('logout') }}" class="private-cabinet" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <img class="private-cabinet__icon" src="{{ asset('img/lock-ico.png') }}" alt="" role="presentation"/>
                              <i class="private-cabinet__text">Выход</i>
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST">
                              {{ csrf_field() }}
                          </form>
                      @endif
                  </div>
              </div>
          </div>
      </div>

    <div class="header__logo">
      <a class="header-logo" href="{{ url('/admin/') }}">
        <span class="first-logo-part">doc<span class="inner-part-logo">Urolog</span></span>
      </a>
    </div>
    <div class="header-patient__nav">
      <nav class="header-nav">
          <a class="header-nav__link" href="{{ url('/admin/') }}">Записать</a>
          <a class="header-nav__link" href="{{ url('/admin/questions') }}">Вопросы</a>
          <a class="header-nav__link" href="{{ url('/admin/reviews') }}">Отзывы</a>
          <a class="header-nav__link" href="{{ url('/admin/calendar') }}">Прием</a>
          <a class="header-nav__link" href="{{ url('/admin/events') }}">События</a>
          <a class="header-nav__link" href="{{ url('/admin/patients') }}">Пациенты</a>
      </nav>
    </div>
    <div class="header__private-cabinet">
      @if( Auth::guest() )
        <a href="{{ route('login') }}" class="private-cabinet">
          <img class="private-cabinet__icon" src="{{ asset('img/lock-ico.png') }}" alt="" role="presentation"/><i class="private-cabinet__text">Вход</i>
        </a>
      @else
        <a href="{{ route('logout') }}" class="private-cabinet" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <img class="private-cabinet__icon" src="{{ asset('img/lock-ico.png') }}" alt="" role="presentation"/>
          <i class="private-cabinet__text">Выход</i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          {{ csrf_field() }}
        </form>
      @endif
    </div>
  </div>
</header>