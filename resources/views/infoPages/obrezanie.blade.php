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
                          <h4 class="method__title title-single">Когда рекомендуется проводить обрезание?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">1</p>
                            </div>
                            <ul class="info-content">
                              <li>при фимозе</li>
                              <li>при парафимозе</li>
                              <li>при поражении крайней плоти кандиломами или лейкоплакией</li>
                              <li>при образовании спаек между крайней плотью и слизистой головки полового члена</li>
                              <li>при хроническом кандидозном воспалении головки</li>
                              <li>при избытке крайней плоти</li>
                              <li>при трещинах крайней плоти и слизистой головки</li>
                              <li>при ускоренном семяизвержении</li>
                            </ul>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Как происходит процедура?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">2</p>
                            </div>
                            <p class="info-content">При проведении операции используются современные методы обезболивания, поэтому пациент испытывает только легкую боль в момент укола. Применение радиоволнового скальпеля позволяет провести вмешательство бескровно и безболезненно.</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Cуществует ли альтернатива  обрезанию?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">3</p>
                            </div>
                            <p class="info-content">Пластика крайней плоти. Проведение пластики позволяет полностью сохранить крайнюю плоть, расширив ее отверстие, это улучшает качество секса и дает возможность проводить гигиену препуциального мешка.</p>
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
                          <h4 class="method__title title-single">В чем польза обрезания?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">4</p>
                            </div>
                            <ul class="info-content">
                              <li>облегчается совершение гигиены головки полового члена в случае фимоза </li>
                              <li>улучшается качество секса </li>
                              <li>продлевается продолжительность полового акта при ускоренном семяизвержении</li>
                              <li>снижается вероятность развития воспалений предстательной железы, мочеиспускательного канала, почек. </li>
                              <li>снижается риск развития заболеваний передающихся половым путем</li>
                            </ul>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Cколько длится процедура?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">5</p>
                            </div>
                            <p class="info-content">Продолжительность подготовки и проведения до 60мин.</p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Возможно ли заражение?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">6</p>
                            </div>
                            <p class="info-content">Пользуюсь только разовым стерильным материалом и инструментами, что исключает возможность развития осложнений. </p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Какие рекомендации после проведения обрезания?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">7</p>
                            </div>
                            <p class="info-content">Необходо 2 перевязки с периодичностью в 3 дня.   Пернвязки и последующие обращения по послеоперационному периоду бесплатны. Через десять дней после операции снимаем швы. Месяц со дня операции рекомендую воздерживаться от секса.</p>
                          </div>
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
