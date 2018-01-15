@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
	<section class="prices">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')
            
            <div class="main-info">
              <div class="main-info__left-part">
                <div class="prices-list">
                  <div class="prices-list__prices">
                    <div class="prices-body">
                      <h4 class="prices-body__title">Приём и назначения лечения
                      </h4>
                      <div class="price-list">
                        <div class="price-row">
                          <p class="price-row__name">Первичный прием
                          </p>
                          <p class="price-row__value">200 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Коррекция лечения
                          </p>
                          <p class="price-row__value">0 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Повторный прием
                          </p>
                          <p class="price-row__value">100грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Взятие материала на мазок
                          </p>
                          <p class="price-row__value">150грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__value info">При возникновении вопросов в процессе лечения свяжитесь со мной по указанным на сайте телефонам,
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__middle-part">
                <div class="prices-list">
                  <div class="prices-list__prices">
                    <div class="prices-body">
                      <h4 class="prices-body__title">Процедуры
                      </h4>
                      <div class="price-list">
                        <div class="price-row">
                          <p class="price-row__name">Массаж простаты
                          </p>
                          <p class="price-row__value">150 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Инстилляция уретры
                          </p>
                          <p class="price-row__value">400 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Развернутая спермограмма
                          </p>
                          <p class="price-row__value">200 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Удаление папиллом, кандилом  радиоволновым скальпелем(1ед)
                          </p>
                          <p class="price-row__value">150грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Множественное удаление папиллом, кандилом и т.д
                          </p>
                          <p class="price-row__value">1800 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Обрезание радиоволновым скальпелем
                          </p>
                          <p class="price-row__value">4000 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Консультация по поводу обрезания
                          </p>
                          <p class="price-row__value">0 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Вправление парафимоза
                          </p>
                          <p class="price-row__value">400 грн
                          </p>
                        </div>
                        <div class="price-row">
                          <p class="price-row__name">Плазмолифтинг
                          </p>
                          <p class="price-row__value">1000 грн
                          </p>
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