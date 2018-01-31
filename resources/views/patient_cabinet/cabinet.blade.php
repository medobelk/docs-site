@extends('patient_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">
          <div class="visits">
              @if( isset($visit) )
                <div class="visite">
                  <div class="visit-info-block">
                    <p class="is-italic has-text-weight-bold info-block-title">Дата Визита</p>
                    <p>{{ $visit->visit_date }}</p>
                  </div>
                  <div class="visit-info-block">
                    <p class="info-block-title has-text-weight-semibold">Жалобы</p>
                    <p>{{ $visit->complaints }}</p>
                  </div>
                  <div class="visit-info-block">
                    <p class="info-block-title has-text-weight-semibold">Диагноз</p>
                    <p>{{ $visit->diagnosis }}</p>
                  </div>
                  <div class="visit-info-block">
                    <p class="info-block-title has-text-weight-semibold">Лечение</p>
                    <p>{{ $visit->treatment }}</p>
                  </div>
                  <div class="visit-info-block">
                    <p class="info-block-title has-text-weight-semibold">Рекомендации</p>
                    <p>{{ $visit->recomendations }}</p>
                  </div>

                  <div class="visit-info-block">
                    <img src="">
                    <p class="info-block-title has-text-weight-semibold">Анализы</p>
                    <div class="is-flex analyzes">
                      @foreach( $visit->analyzes as $analyze )
                        <div class="analyze">
                          <div class="analyze-info-wrapper">
                            <a download="{{ $analyze->name }}" href="{{ asset("docurolog.od.ua/storage/app/public$analyze->path") }}">
                              <span class="icon is-large">
                                <i class="fa fa-3x fa-file-text-o" aria-hidden="true"></i>
                              </span>
                              <p class="analyze-name">
                                {{ $analyze->name }}
                              </p>
                            </a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif
          </div>
        </div>

        @include('patient_cabinet.sidebar')

      </div>
    </div>
    <!-- <div class="sidebar"></div> -->
  </div>
</section>

@endsection