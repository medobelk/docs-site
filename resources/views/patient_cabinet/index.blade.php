@extends('patient_cabinet.master')

@section('content')
<section class="main-content">
  <div class="main-content__container">
    <div class="history-body">
      <div class="history-field first">
        <div class="history-field__name">Ф.И.О
        </div>
        <div class="history-field__value first">Калина Марина Александровна
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Электронный адрес
        </div>
        <div class="history-field__value">Alexndrovna@gmail.com
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Дата приема
        </div>
        <div class="history-field__value">11.08.2017
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Дата рождения
        </div>
        <div class="history-field__value">14.07.1976
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Жалобы
        </div>
        <div class="history-field__value">Учащёное болезненное мочесипускание, боль в правом подреберье, температруа 37,3, тошнота
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Курс лечени
        </div>
        <div class="history-field__value">Alexndrovna@gmail.com
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Рекомендации
        </div>
        <div class="history-field__value">Alexndrovna@gmail.com
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Контрольный осмотр
        </div>
        <div class="history-field__value">декабрь 2017
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Анализы
        </div>
        <div class="history-field__value analizi"><a class="analiz" href="#"><i class="analiz__icon fa fa-file-text-o"></i>
          <p class="analiz__link">Analiz-kalina.pdf
          </p></a><a class="analiz" href="#"><i class="analiz__icon fa fa-file-text-o"></i>
          <p class="analiz__link">Analiz-kalina.pdf
          </p></a>
        </div>
      </div>
      <div class="history-field">
        <div class="history-field__name">Диагноз
        </div>
        <div class="history-field__value">3 круг ада
        </div>
      </div>
    </div>

    @include('patient_cabinet.sidebar')

  </div>
</section>
@endsection