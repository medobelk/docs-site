@extends('patient_cabinet.master')

@section('content')

<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">

          <form class="adding-form" action="{{ url('/cabinet/add-enroll') }}" method="POST">
          {{ csrf_field() }}

          <div class="info-block">
            <p class="info-block-title">Имя</p>
            <p class="info-block-title has-text-weight-semibold">{{ $user->name }}</p>
          </div>

          <div class="info-block">
            <p class="info-block-title">Телефон*</p>
            <input class="input-field" type="text" name="phone" value="{{ $user->phone }}">
          </div>

          <div class="info-block">
            <p class="info-block-title">Дата*</p>
            <input class="input-field" type="text" name="date" id="datetimepicker">
          </div>
        
          <div class="info-block">
            <p class="info-block-title">Суть проблемы</p>
            <textarea class="area-field" name="complaints">{{old('complaints')}}</textarea>
          </div>

          <div class="info-block">
            <p class="info-block-title">Рекомендации</p>
            <textarea class="area-field" name="recomendations">{{old('recomendations')}}</textarea>
          </div>

          <p class="has-text-weight-semibold" style="margin-bottom: 10px;">Удостоверьтесь, что все данные указаны верно</p>

          <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="Записаться"/>

          </form>
        </div>


        @include('patient_cabinet.sidebar')

      </div>
    </div>
    <!-- <div class="sidebar"></div> -->
  </div>
</section>
@endsection
