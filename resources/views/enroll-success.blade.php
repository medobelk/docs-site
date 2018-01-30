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
              <p class="error-text__text"> Заявка на прием создана</p>
              <p class="error-text__text"> В ближайшее время я свяжусь с вами, чтобы уточнить дату и время. Если у вас есть предыдущие анализы или заключения по возникшей проблеме, возьмите их с собой.</p>
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