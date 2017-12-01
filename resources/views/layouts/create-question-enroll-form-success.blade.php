<script>
  $('document').ready(function () {    
    var thanks_block = {!! json_encode(session()->get('thanks_block')) !!};

    if( thanks_block === 'enrollTrue' ){
      $('.main-info__left-part').empty();
      $('.main-info__middle-part').empty();
      $('.main-info__right-part').empty();      
      $('#left-part').empty();
      $('#middle-part').empty();
      $('#right-part').empty();

      $('.main-info__left-part').append(`<div class="erorr-404"><img class="erorr-404__image-404" src="{{ asset('img/thanks.png') }}" alt="" role="presentation"/></div>`);

      $('.main-info__middle-part').append(`
      <div class="error-text">
        <p class="error-text__text"> Вы записаны на прием  23.12 в 11:00</p>
        <p class="error-text__text"> Если у вас есть предыдущие анализы или заключения по возникшей проблеме, возьмите их с собой.</p>
        <a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
      </div>
      `);

      $('.main-info__right-part').append(`
        <div class="doctor-form">
          <form class="form-body" method="POST" action="{{ url('/create-question') }}">
            {{ csrf_field() }}
            <div class="form-body__title">Задать вопрос</div>
            <input class="form-body__field" name="question_name" value="{{ old('question_name') }}" placeholder="Ваше имя*" type="text"/>
            <input class="form-body__field" name="question_email" value="{{ old('question_email') }}" placeholder="Электронный адрес*" type="text"/>
            <textarea class="form-body__field" name="question_complaints" rows="5" placeholder="Суть проблемы*">{{ old('question_complaints') }}</textarea>
            <input class="form-body__check-box" id="subscride-checkbox" name="question_subscription" type="checkbox" checked>
            <label for="subscride-checkbox" class="form-body__text">Получить ответ на почту</label>
            <input class="form-body__write-btn" type="submit" value="Отправить"/>
          </form>
        </div>
      `);

      $('#left-part').append(`<div class="erorr-404"><img class="erorr-404__image-404" src="{{ asset('img/thanks.png') }}" alt="" role="presentation"/></div>`);

      $('#middle-part').append(`
      <div class="error-text">
        <p class="error-text__text"> Вы записаны на прием  23.12 в 11:00</p>
        <p class="error-text__text"> Если у вас есть предыдущие анализы или заключения по возникшей проблеме, возьмите их с собой.</p>
        <a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
      </div>
      `);

      $('#right-part').append(`
        <div class="doctor-form">
          <form class="form-body" method="POST" action="{{ url('/create-question') }}">
            {{ csrf_field() }}
            <div class="form-body__title">Задать вопрос</div>
            <input class="form-body__field" name="question_name" value="{{ old('question_name') }}" placeholder="Ваше имя*" type="text"/>
            <input class="form-body__field" name="question_email" value="{{ old('question_email') }}" placeholder="Электронный адрес*" type="text"/>
            <textarea class="form-body__field" name="question_complaints" rows="5" placeholder="Суть проблемы*">{{ old('question_complaints') }}</textarea>
            <input class="form-body__check-box" id="subscride-checkbox" name="question_subscription" type="checkbox" checked>
            <label for="subscride-checkbox" class="form-body__text">Получить ответ на почту</label>
            <input class="form-body__write-btn" type="submit" value="Отправить"/>
          </form>
        </div>
      `);
    }

    if( thanks_block === 'questionTrue'){
      $('.main-info__left-part').empty();
      $('.main-info__middle-part').empty();
      $('#left-part').empty();
      $('#middle-part').empty();

      $('.main-info__left-part').append(`<div class="erorr-404"><img class="erorr-404__image-404" src="{{ asset('img/thanks.png') }}" alt="" role="presentation"/></div>`);
      $('.main-info__middle-part').append(`
      <div class="error-text">
        <p class="error-text__text"> Я отвечу вам как только смогу.</p>
        <p class="error-text__text"> Вам на почту прийдет ответ со ссылкой на почту, так же он станет доступен на странице с вопросами.</p>
        <a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
      </div>
      `);
      $('#left-part').append(`<div class="erorr-404"><img class="erorr-404__image-404" src="{{ asset('img/thanks.png') }}" alt="" role="presentation"/></div>`);
      $('#middle-part').append(`
      <div class="error-text">
        <p class="error-text__text"> Я отвечу вам как только смогу.</p>
        <p class="error-text__text"> Вам на почту прийдет ответ со ссылкой на почту, так же он станет доступен на странице с вопросами.</p>
        <a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
      </div>
      `);
    }

  });
</script>
