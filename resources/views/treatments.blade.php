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
                        <h4 class="method__title" style="padding-top: 0px;">Немедикаментозные  методы лечения</h4>
                        <div class="info-wrapper">
                          <h4 class="method__title title-single"><a href="{{ asset('/Pagec/view/name/plasmolifting') }}">Плазмолифтинг</a></h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-blue">
                              <p class="square-content">1</p>
                            </div>
                            <p class="info-content">Улучшает процессы местного иммунитета, что приводит к значительному снижению частоты возникновения обострений. Кровь пациента набирается в специальную одноразовую пробирку, помещается в центрифугу, где выделяется богатая тромбоцитами масса. Затем обогащенная тромбоцитами масса вводится в область больного органа. Это приводит к активизации иммунитета, процессов восстановления и омоложения тканей.  </p>
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
                          <h4 class="method__title title-single"><a href="{{ asset('/Pagec/view/name/injections') }}">Парауретральные иньекции гиалуроновой кислоты</a></h4>  
                          <div class="info-content-wrapper">
                            <div class="info-square info-square-dark">
                              <p class="square-content">2</p>
                            </div>
                            <p class="info-content">Парауретральные инъекции  гиалуроновой  кислоты способствуют привлечению и удержанию в тканях воды, а поскольку процесс старения напрямую связан с потерей воды, это предупреждает старение и способствует омоложению тканей. Повышается упругость тканей,  </p>
                          </div>
                        </div>
                        <div class="info-wrapper">
                          <p class="info-content is-italic no-mr-lf">Данные методы лечения снижают медикамендозную нагрузку на организм и значительно повышают эффективность лечения урологических заболеваний.</p>
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
