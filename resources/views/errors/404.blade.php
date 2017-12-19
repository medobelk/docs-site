@extends('layouts.master')
@section('content')
<section class="merhods">
  <div class="container">
    <div class="main">
      @include('layouts.question-list')
      <div class="main-info">
        <div class="main-info__left-part">
          <div class="erorr-404"><img class="erorr-404__image-404" src="{{ asset('img/404-page.png') }}" alt="" role="presentation"/>
          </div>
        </div>
        <div class="main-info__middle-part">
          <div class="error-text">
            <p class="error-text__text"> Запрашиваемая вами страница еще не создана либо находится в разработке.
            </p>
            <p class="error-text__text"> Если вы не нашли ответа на интересующий вас вопрос, можете задать его здесь, воспользуясь формой.
            </p><a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
          </div>
        </div>
        <div class="main-info__right-part">
          
          @include('layouts.question-form')

        </div>
      </div>
    </div>
    
    @include('layouts.sidebar')

  </div>
</section>
@endsection