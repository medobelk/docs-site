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
          <form class="form-body">
            <div class="form-body__title">Приходите на приём
            </div><input class="form-body__field" placeholder="Ваше имя*" type="text"/><input class="form-body__field" placeholder="Телефон*" type="text"/><input class="form-body__field" placeholder="Дата*" type="text"/><input class="form-body__field" placeholder="Время*" type="text"/><textarea class="form-body__field" rows="5" name="Суть проблемы">Say hello to</textarea>
            <p class="form-body__text">Удостоверьтесь что данные указаны верно
            </p><input class="form-body__write-btn" type="submit" value="Записаться"/>
          </form>
        </div>
      </div>
    </div>
    
    @include('layouts.sidebar')

  </section>
@endsection