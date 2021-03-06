@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
  <section class="intro">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')
            
            <div class="main-info">
              <div class="content-area">
                <div class="doctor-info" id="left-part">
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
                    <div class="value diplom-serf">
                      
                      <a class="diplom" href="{{ url('/Pagec/view/name/sertificates') }}"><img class="diplom__image" src="img/diplom.png" alt="" role="presentation"/>
                        <p class="diplom__link">Дипломы, сертификаты</p>
                      </a>

                      <a class="serf" href="http://www.eurolab.ua/consultation-doctors/33178/"><img class="serf__image" src="img/serf.png" alt="" role="presentation"/>
                        <p class="serf__link">Отзывы, eurolab</p>
                      </a>
                    
                    </div>
                  </div>
                </div>
                <div class="doctor-services" id="middle-part">
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
              </div>
              
              <div id="right-part">
                @include('layouts.enroll-form')
              </div>
            </div>
          </div>
          
          @include('layouts.sidebar')

        </div>
      </section>
@endsection
