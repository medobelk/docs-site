@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
  <section class="zabolevania-womans">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">
          <div class="main-info__left-part">
            <div class="erorr-404"><img class="erorr-404__image-404" src="{{ asset('img/thanks.png') }}" alt="" role="presentation"/></div>
          </div>
          <div class="main-info__middle-part">
            <div class="error-text thanks-section">
              <p class="error-text__text"> Я отвечу вам как только смогу.</p>
              <p class="error-text__text"> Вам на почту прийдет ответ со ссылкой на ответ, так же он станет доступен на странице с вопросами.</p>
              <a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
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