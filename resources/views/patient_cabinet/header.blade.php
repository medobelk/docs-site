<header class="section">
  <div class="container">
    <div class="columns" style="justify-content: center;">
      <div class="column is-2 has-text-centered">
        <a class="logo"><b class="logo-left">doc</b><b class="logo-right">Urolog</b></a>
      </div>
      <div class="column nav is-6 has-text-left" >
        
        <a href="{{ url('/cabinet/') }}">история болезни</a>
        <a href="{{ url('/cabinet/question') }}">задать вопрос</a>
        <a href="{{ url('/cabinet/enroll') }}">записаться на приём</a>
        
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout" style="margin-left: 20px;">Выход</a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          {{ csrf_field() }}
        </form>
        
      </div>
    </div>
  </div>
</header>