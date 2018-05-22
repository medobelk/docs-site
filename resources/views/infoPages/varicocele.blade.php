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

                          <h4 class="method__title title-single">Что такое варикоцеле?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">1</p>
                            </div>
                            <p class="info-content">Варикоцеле (расширение вен яичка) - расширение вен гроздьевидного сплетения  семенного канатика в связи с нарушением оттока крови по этим венам. Такое расширение чаше всего бывает связано с плохой работой клапанов, находящихся в  вене яичка, это как правило обусловлено наследственным фактором.
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Каковы симптомы варикоцеле?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">2</p>
                            </div>
                            <p class="info-content">Варикоцеле чаще всего протекает без симптомов, иногда возникают боли разной выраженности и локализации, часто с противоположной стороны. Боли могут  возникать после длительной физической нагрузки, полового акта, длительного сидения или стояния.
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Чем опасно варикоцеле?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">3</p>
                            </div>
                            <p class="info-content">Вследствие нарушения кровообращения нарушается питание ткани, что приводит к атрофии различной степени. Венозный застой, полнокровие приводит к повышению температуры яичка. Для нормального развития спермы температура в яичке должна быть ниже температуры тела. Таким образом это негативно влияет на развитие спермы, и зачастую приводит к бесплодию.
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Как лечится варикоцеле?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">4</p>
                            </div>
                            <p class="info-content">В легких случаях, когда нет угрозы бесплодия, больному проводят коррекцию двигательного режима, лечебную физкультуру, ношение трусов плавочного типа. При угрозе развития бесплодия, нарущении функции яичка мы рекомендуем оперативное лечение.
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Когда рекомендуется оперативное вмешательство? </h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">5</p>
                            </div>
                            <p class="info-content">При угрозе развития бесплодия, нарущении функции яичка мы рекомендуем оперативное лечение. 
                            </p>
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
                          <h4 class="method__title title-single">Какие существуют операции?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">6</p>
                            </div>
                            <p class="info-content">Существует множество видов операций при варикоцеле: по Иванисевичу, Паломо, методами лапороскопии. Однако они зачастую заканчиваются  рецидивами или другими осложнениями.На курс достаточно одной процедуры, редко рекомендуется повторять через месяц  одну-две процедуры. Продолжительность эффекта - от 8 мес  до 5 лет
                            </p>
                          </div>
                        </div>
                        
                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Почему мы выполняем операцию только по Мармару? </h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">7</p>
                            </div>
                            <p class="info-content">Данный метод наиболее редко сопровождается осложнениями, считается наиболее эффективным и безопастным. Операция при варикоцеле по Мармару признана в большинстве стран Европы и Северной Америки  ввиду минимальной травматизацией тканей.
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Cколько длится операция?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">8</p>
                            </div>
                            <p class="info-content">Продолжительность подготовки и проведения до 60мин.</p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Возможно ли заражение?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">9</p>
                            </div>
                            <p class="info-content">Пользуюсь только разовым стерильным материалом и инструментами, что исключает возможность развития осложнений.
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper">
                          <h4 class="method__title title-single">Какие рекомендации после проведения операции?</h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">10</p>
                            </div>
                            <p class="info-content">Необходимы 2 перевязки: на следующий день и через 1-2 дня, взять выходные на следующих 1-2 дня после операции. Месяц  рекомендую воздерживаться от секса и отказаться от тяжелых физических нагрузок. Перевязки и последующие обращения по послеоперационному периоду бесплатны. 
                            </p>
                          </div>
                        </div>

                        <div class="info-wrapper no-mr-lf">
                          <p class="info-content">Стоимость - 8000грн</p>
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
