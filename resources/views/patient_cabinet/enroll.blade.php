@extends('patient_cabinet.master')

@section('content')
<section class="main-content enroll-main">
  <div class="main-content__container enroll-container">
    <div class="main-part">
      <form class="adding-form">
        <div class="form-field">
          <p class="form-field__name">Имя
          </p><p class="bold-name">Калина Марина Александровна</p>
        </div>

        <div class="form-field">
          <p class="form-field__name">Телефон*
          </p>
          <input type="text">
        </div>

        <div class="form-field">
          <p class="form-field__name">Дата*
          </p>
          <input type="text">
        </div>

        <div class="form-field">
          <p class="form-field__name">Время*
          </p>
          <input type="text">
        </div>

        <div class="form-field">
          <p class="form-field__name">Суть проблемы
          </p>
          <textarea class="form-field__text-field" rows="10"  name="someTextArea"></textarea>
        </div>
        <p class="alert-text">Удостоверьтесь, что все данные указаны верно</p>
        <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Записаться"/>
        </div>
      </form>
    </div>
    
    @include('patient_cabinet.sidebar')

  </div>
</section>
@endsection