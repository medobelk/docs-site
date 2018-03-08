@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
	<section class="diseases">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')
            
            <div class="main-info">
              <div class="main-info__left-part">
                <div class="methods-list">
                  <div class="methods-list__methods">
                    <div class="methods-body">
                      <div class="method">
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Парауретральные иньекции гиалуроновой кислоты эффективны при: </h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">1</p>
                            </div>
                            <ul class="info-content">
                              <li>недержании мочи </li>
                              <li>хроническом цистите</li>
                              <li>уретрите</li>
                              <li>обострений воспалений почек</li>
                              <li>хроническом простатите</li>
                            </ul>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Принцип действия: </h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">2</p>
                            </div>
                            <p class="info-content">Парауретральные инъекции  гиалуроновой  кислоты способствуют привлечению и удержанию в тканях воды, а поскольку процесс старения напрямую связан с потерей воды, это предупреждает старение и способствует омоложению тканей. Повышается упругость тканей,</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Как происходит процедура?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">3</p>
                            </div>
                            <p class="info-content">Процедура проводится под местной анестезией, благодаря чему происходит безболезненно. Подготовленный раствор гиалуроновой кислоты вводится под слизистую уретры при помощи небольшой иглы(1-2мм) . После процедуры пациент отпускается домой.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__middle-part">
                <div class="methods-list two-text">
                  <div class="methods-list__methods">
                    <div class="methods-body">
                      <div class="method">
						            <div class="info-wrapper">
                          <h4 class="method__title title-single">Сколько необходимо процедур?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">4</p>
                            </div>
                            <p class="info-content">На курс достаточно одной процедуры, иногда процедуру необходимо повторить через 1 месяц.</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Сколько длится процедура?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">5</p>
                            </div>
                            <p class="info-content">Продолжительность подготовки и проведения 10 мин.</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Какие есть противопоказания?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">6</p>
                            </div>
                            <ul class="info-content">
                              <li>непереносимость препарата</li>
                              <li>аутоимунные заболевания</li>
                              <li>нарушение свертываемости крови</li>
                              <li>острые воспалительные процессы</li>
                              <li>беременность и кормление грудью</li>
                            </ul>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <p class="info-content no-mr-lf">Для лучшей эффективности рекомендую сочетать данную процедуру с плазмалифтингом.  Стоимость процедуры - 8000грн</p>
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
