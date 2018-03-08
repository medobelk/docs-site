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
                          <h4 class="method__title title-single">Плазмалифтинг эффективен при: </h4>  
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
                            <p class="info-content">Улучшает процессы местного иммунитета, что приводит к значительному снижению частоты возникновения обострений.</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Как происходит процедура?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">3</p>
                            </div>
                            <p class="info-content">Кровь пациента набирается в специальную одноразовую пробирку, помещается в центрифугу, где выделяется богатая тромбоцитами масса. Затем обогащенная тромбоцитами масса вводится в область больного органа. Это приводит к активизации иммунитета, процессов восстановления и омоложения тканей. </p>
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
                            <p class="info-content">На курс достаточно одной процедуры, редко рекомендуется повторять через месяц  одну-две процедуры. Продолжительность эффекта - от 8 мес  до 5 лет</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Сколько длится процедура</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">5</p>
                            </div>
                            <p class="info-content">Продолжительность подготовки и проведения 15 мин.</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Возможно ли заражение?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">6</p>
                            </div>
                            <p class="info-content">Использования собственной крови пациента полностью исключает возможность заражения.</p>
                          </div>
                        </div>
                        <div class="info-wrapper no-mr-lf">
                          <p class="info-content">Стоимость 1 процедуры = 1300грн</p>
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
