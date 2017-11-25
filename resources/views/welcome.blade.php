@extends('layouts.master')

@section('content')
  <section class="intro">
    <div class="main">
      <div class="questions-list">
        <div class="questions-list__item"><img class="questions-list__image" src="img/questions-image/layer-one.png" alt="" role="presentation"/>
        </div>
        <div class="questions-list__item"><img class="questions-list__image" src="img/questions-image/layer-two.png" alt="" role="presentation"/>
        </div>
        <div class="questions-list__item"><img class="questions-list__image" src="img/questions-image/layer-three.png" alt="" role="presentation"/>
        </div>
        <div class="questions-list__item"><img class="questions-list__image" src="img/questions-image/layer-four.png" alt="" role="presentation"/>
        </div>
      </div>
      <div class="main-info">
        <div class="doctor-info">
          <div class="doctor-info__top"><img class="doctor-image" src="img/questions-image/doctor-image.png" alt="" role="presentation"/>
            <div class="doctor-text">
              <h3 class="doctor-text__name">Брезицкий Юрий Иосифович
              </h3>
              <h3 class="doctor-text__employ">Врач-уролог высшей категории
              </h3>
              <h3 class="doctor-text__info">Работает по программе проекта ЮНИСЕФ "Клиника дружественная молодежи"
              </h3>
            </div>
          </div>
          <div class="doctor-info__bottom">
            <p class="info-text">Автор 8 докладов на международных конференциях, автор 5 публикаций в специальных профессиональных журналах, автор методических рекомендаций по лечению урологических больных методами озонотерапии МОЗ Украины.
            </p>
            <div class="value diplom-serf"><a class="diplom" href="#"><img class="diplom__image" src="img/diplom.png" alt="" role="presentation"/>
              <p class="diplom__link">Дипломы, сертификаты
              </p></a><a class="serf" href="#"><img class="serf__image" src="img/serf.png" alt="" role="presentation"/>
              <p class="serf__link">Отзывы пациентов
              </p></a>
            </div>
          </div>
        </div>
        <div class="doctor-services">
          <div class="doctor-services__service">
            <div class="service-body">
              <h4 class="service-body__title">Диагностика
              </h4>
              <p class="service-body__text">Бактериоскопия, цитология, бакпосев, реакция иммунофлуоресценции (прямой, непрямой), определение чувствительности возбудителя к антибиотикам, вирусологические исследования, П.Ц.Р. (полимеразно-цепная реакция), иммуноферментный анализ (ИФА).
              </p>
            </div>
          </div>
          <div class="doctor-services__service">
            <div class="service-body">
              <h4 class="service-body__title">Принципы работы:
              </h4>
              <p class="service-body__text first">Анонимность, доброжелательность, понимание и принятие проблем обратившихся, конфиденциальность, не осуждающий подход.
              </p>
              <p class="service-body__text">В лечении использую антибиотики, гомотоксикологические методы, плазмалифтинг, плазмаферез.
              </p>
              <p class="service-body__text last">Своевременное обращение к врачу поможет в дальнейшем избежать осложнений.
              </p>
            </div>
          </div>
        </div>
        <div class="doctor-form">
          <form class="form-body" method="POST" action="{{ url('/enroll') }}">
            {{ csrf_field() }}
            {{ dump(session()->all()) }}
            <div class="form-body__title">Приходите на приём</div>
            <input class="form-body__field" name="patient_name" placeholder="Ваше Ф.И.О.*" type="text"/>
            <input class="form-body__field" name="patient_phone" placeholder="Телефон*" type="text"/>
            <input class="form-body__field" name="patient_email" placeholder="e-mail*" type="text"/>
            <input class="form-body__field" id="datepicker" name="patient_visit_date" placeholder="Дата*" type="text"/>
            <input class="form-body__field" name="patient_visit_time" placeholder="Время*" type="text"/>
            <textarea class="form-body__field" name="patient_complaints" rows="5" placeholder="Суть проблемы"></textarea>
            <p class="form-body__text">Удостоверьтесь что данные указаны верно</p>
            <input class="form-body__write-btn" type="submit" value="Записаться"/>
          </form>
        </div>
      </div>
    </div>
    
    @include('layouts.sidebar')

  </section>
@endsection

@section('page-scripts')
  <script>
    $('document').ready(function () {
      var form_errors = {!! json_encode(session()->get('form_errors')) !!};
      if( form_errors ){
        $.each(form_errors, function (field_name, field_error) {
          $('input[name='+field_name+']').css('border', '1px solid red');
        });
      }

      $( "#datepicker" ).datepicker();
    });
  </script>
@endsection