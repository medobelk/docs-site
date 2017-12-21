@extends('layouts.master')

@section('content')
  <section class="about-page">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">

          <div class="main-info__middle-part all-serfs">
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
                        </A>
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
    </div>
  </section>
@endsection