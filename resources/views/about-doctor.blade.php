@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
  <section class="about-page">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">
          <div class="main-info__left-part">
            <div class="main-info">
              <div class="content-area">
                <div class="doctor-info">
                  <div class="doctor-info__top"><img class="doctor-image" src="{{ asset('img/questions-image/doctor-image.png') }}" alt="" role="presentation"/>
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
                          <h4 class="service-body__title">Последний оставленный отзыв
                          </h4>
                          <div class="reviews">
                            @if( isset($review) )
                              <p class="reviews__name">
                                
                                
                                  @if( $review->authority === 'USER' )
                                    {{ $review->user->name }}
                                  @else
                                    {{ 'Аноним' }}
                                  @endif
                                
                              </p>
                              <p class="reviews__review">
                                {{ $review->body }}
                              </p>
                            @endif
                            <a class="reviews__read-all" href="{{ url('/reviews') }}">читать все отзывы</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main-info__middle-part">
            <div class="serfs-list">
              <div class="serfs-list__serfs">
                <div class="serfs-body">
                  <h4 class="serfs-body__title">Сертификаты, удостоверения
                  </h4>
                  <div class="serfs-list">
                    <h4 class="serfs-list__title">Атестации, лицензия
                    </h4>
                    <div class="serfs">
                      <ol>
                        <a href="{{ url('/') }}">
                          <SPAN>1</SPAN>
                          <LI> Свидетельство про аттестацию в 2015 году по специальности «урология», высшая категория</LI>
                        </a>
                        <a href="{{ url('/') }}">
                          <SPAN>2</SPAN>
                          <LI>2 Сертификат врача-специалиста, выдан МОЗ Украины</LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>3</SPAN>
                          <LI>Лицензия на медицинскую практику</LI>
                        </A>
                      </ol>
                    </div>
                  </div>
                  <div class="serfs-list">
                    <h4 class="serfs-list__title">Конференции
                    </h4>
                    <div class="serfs">
                      <ol>
                        <a href="{{ url('/') }}">
                          <SPAN>1</SPAN>
                          <LI> Сертификат о прохождении урологической конференции в Харькове
                            <SPAN>2017г</SPAN>
                          </LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>2</SPAN>
                          <LI>Участие в работе научно-практической конференции в  Киеве,
                            <SPAN>2014г</SPAN>
                          </LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>3</SPAN>
                          <LI>Сертификат по подтверждению квалификации по ИППП ,
                            <SPAN>2013г</SPAN>
                          </LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>4</SPAN>
                          <LI>Сертификат участника юбилейной научно-практической конференции, ОНМУ МОЗ Украины,
                            <SPAN>2013г</SPAN>
                          </LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>5</SPAN>
                          <LI>Сертификат участника урологической научно-практической конференции в Киеве,
                            <SPAN>2012г</SPAN>
                          </LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>6</SPAN>
                          <LI>Cертификат участника Регионального конгресса «Людина та ліки-Україна»,
                            <SPAN>2011г</SPAN>
                          </LI>
                        </A>
                        <a href="{{ url('/') }}">
                          <SPAN>7</SPAN>
                          <LI>Сертификат о прохождении курса ESU, European school of Urology,  Bladder cancer,
                            <SPAN>2008г</SPAN>
                          </LI>
                        </A>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main-info__right-part">
          
            @include('layouts.enroll-form')

          </div>
        </div>
      </div>
      
      @include('layouts.sidebar')

  </section>
@endsection