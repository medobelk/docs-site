@extends('layouts.master')

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
                      <div class="method"><img class="method__dis-image" src="img/disase-image.png" alt="" role="presentation"/>
                        <h4 class="method__title">Плазмолифтинг
                        </h4>
                        <p class="method__text">Метод плазмалифтинга в урологии основан на способности определенных компонентов  крови оказывать  сильное влияние на процессы восстановления и омоложения тканей.
                        </p>
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
                        <p class="method__text"> Использования собственной крови пациента полностью исключает возможность заражения.
                        </p>
                        <p class="method__text"> Использования собственной крови пациента полностью исключает возможность заражения.
                        </p>
                        <p class="method__text"> Издавна эти свойства используются  в методе  аутогемотерапии. В этом случае  кровь, набранная  из вены больного, вводится в мышцу или подкожно. В методе плазмолифтинга кровь пациента набирается в специальную одноразовую пробирку, помещается в центрифугу, где выделяется богатая тромбоцитами масса. Затем обогащенная тромбоцитами масса вводится в область больного органа. Это приводит к активизации иммунитета, процессов восстановления и омоложения тканей.
                        </p>
                        <p class="method__text"> В урологической практике после первой-второй процедуры, при хроническом цистите у женщин или простатите у мужчин, проходят такие симптомы:
                        </p>
                        <p class="method__text no-pad"> - учащенное мочеиспускание
                        </p>
                        <p class="method__text no-pad">  - рези и боли при мочеиспускании
                        </p>
                        <p class="method__text no-pad">  - затруднение мочеиспускания
                        </p>
                        <p class="method__text no-pad">  - сильные позывы
                        </p>
                        <p class="method__text"> Высокая эффективность метода отмечается при недержании мочи.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__right-part">
                
                @include('layouts.question-form')

              </div>
            </div>
          </div>
          
		  @include('layouts.sidebar')

        </div>
      </section>
@endsection
@include('layouts.create-question-form-success')