@extends('patient_cabinet.master')

@section('content')
<section class="main-content">
  <div class="main-content__container">
    <div class="history-body">
      @if( isset($visit) )
      <div class="history-field first">
        <div class="history-field__name">Ф.И.О
        </div>
        <div class="history-field__value first">{{ $visit->name }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Электронный адрес</div>
        <div class="history-field__value">{{ $visit->email }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Дата приема</div>
        <div class="history-field__value">{{ date( 'd.m.Y', strtotime($visit->visit_date) ) }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Дата рождения</div>
        <div class="history-field__value">{{ date( 'd.m.Y', strtotime($user->birth_date) ) }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Жалобы</div>
        <div class="history-field__value">{{ $visit->complaints }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Курс лечени</div>
        <div class="history-field__value">{{ $visit->treatment }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Рекомендации</div>
        <div class="history-field__value">{{ $visit->recomendations }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Контрольный осмотр</div>
        <div class="history-field__value">{{ date( 'd.m.Y', strtotime( $user->control_visit ) ) }}</div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Анализы</div>
        <div class="history-field__value analizi">
          @foreach( $visit->analyzes()->get() as $analyze )
            <a class="analiz" href="{{ 'storage/'.json_decode( $analyze->path )[0]->download_link }}" download="{{ $analyze->name }}">
              <i class="analiz__icon fa fa-file-text-o"></i>
              <p class="analiz__link">{{ $analyze->name }}</p>
            </a>
          @endforeach
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Диагноз</div>
        <div class="history-field__value">{{ $visit->diagnosis }}</div>
      </div>
    @endif
    </div>

    @include('patient_cabinet.sidebar')

  </div>
</section>
@endsection