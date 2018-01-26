<header class="section">
  <div class="container">
    <div class="columns" style="justify-content: center;">
        <div class="column is-2 has-text-centered">
          <a class="logo"><b class="logo-left">doc</b><b class="logo-right">Urolog</b></a>
        </div>
      <div class="column nav is-6 has-text-left" >
        
        <a href="{{ url('/admin/') }}">Записать</a>
        <a href="{{ url('/admin/questions') }}">Вопросы</a>
        <a href="{{ url('/admin/reviews') }}">Отзывы</a>
        <a href="{{ url('/admin/calendar') }}">Прием</a>
        <a href="{{ url('/admin/events') }}">События</a>
        <a href="{{ url('/admin/patients') }}">Пациенты</a>
        
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout" style="margin-left: 20px;">Выход</a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          {{ csrf_field() }}
        </form>
        
      </div>
    </div>
  </div>
</header>