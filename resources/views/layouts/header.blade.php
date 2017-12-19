<header class="header">
  <div class="header__container">
    <div class="mobile-menu"><img class="mobile-menu__icon" src="{{ asset('img/mobile-burger.png') }}" alt="" role="presentation"/>
      <div class="mobile-menu__links hide">
        <div class="flex-block">
          <div class="links-block">
              <a class="mobile-menu__link" href="{{ url('/Pagec/view/name/about') }}">обо мне</a>
              <a class="mobile-menu__link" href="{{ url('/Pagec/view/name/hvor') }}">заболевания</a>
              <a class="mobile-menu__link" href="{{ url('/Pagec/view/name/methods') }}">методы лечения</a>
              <a class="mobile-menu__link" href="{{ url('/pricing') }}">цены</a>
              <a class="mobile-menu__link" href="{{ url('/contacts') }}">контакты</a>
              <a class="mobile-menu__link" href="{{ url('/QA/getlist') }}">вопросы</a>
          </div>
          <div class="header__private-cabinet private-visible">
            <a class="private-cabinet"><img class="private-cabinet__icon" src="{{ asset('img/mobi-ico.png') }}" alt="" role="presentation"/><i class="private-cabinet__text">Вход</i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header__logo">
      <a class="header-logo" href="{{ url('/') }}"> 
        <img class="header-logo__img" src="{{ asset('img/logo/logo.png') }}" alt="" role="presentation"/>
      </a>
    </div>
    <div class="header__telephones">
      <a class="header-telephone" href="##">
        <i class="header-telephone__icon fa fa-phone"></i>
        <a href="tel:+380674899134" class="header-telephone__telephone-link first">+38(067)
          <SPAN>489 91 34</SPAN>
        </a>
        <a href="tel:+380487043758" class="header-telephone__telephone-link second">+38(048)
          <SPAN>704 37 58</SPAN>
        </a>
      </a>
    </div>
    <div class="header__adress">
      <div class="header-adress"><img class="header-adress__icon" src="{{ asset('img/marker-ico.png') }}" alt="" role="presentation"/><span class="header-adress__text">Семинарская 7, каб. 21</span>
      </div>
    </div>
    <div class="header__nav">
      <nav class="header-nav">
        <a class="header-nav__link" href="{{ url('/Pagec/view/name/about') }}">обо мне</a>
        <a class="header-nav__link" href="{{ url('/Pagec/view/name/hvor') }}">заболевания</a>
        <a class="header-nav__link" href="{{ url('/Pagec/view/name/methods') }}">методы лечения</a>
        <a class="header-nav__link" href="{{ url('/pricing') }}">цены</a>
        <a class="header-nav__link" href="{{ url('/contacts') }}">контакты</a>
        <a class="header-nav__link" href="{{ url('/QA/getlist') }}">вопросы</a>
      </nav>
    </div>
    
    <div class="header__private-cabinet"> 
      @if( Auth::guest() )
        <a href="{{ route('login') }}" class="private-cabinet">
          <img class="private-cabinet__icon" src="{{ asset('img/mobi-ico.png') }}" alt="" role="presentation"/><i class="private-cabinet__text">Вход</i>
        </a>
      @else
        <a href="{{ route('logout') }}" class="private-cabinet" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <img class="private-cabinet__icon" src="{{ asset('img/mobi-ico.png') }}" alt="" role="presentation"/>
          <i class="private-cabinet__text">Выход</i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          {{ csrf_field() }}
        </form>
      @endif
    </div>
  </div>
</header>