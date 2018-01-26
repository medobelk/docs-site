@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
      <div class="container">
        <div class="block" >
          <div class="columns" style="justify-content: center;">
            <div class="column is-2"></div>
            <div class="column is-4">
              
              <div class="user-block">
                <div class="info-block">
                  <p class="info-block-title">Ф.И.О.</p>
                  <p class="is-italic has-text-weight-bold">{{ $visit->user->name }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Электронный Адрес</p>
                  <p class="is-italic">{{ $visit->user->email }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Номер</p>
                  <p class="is-italic">{{ $visit->user->phone }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Дата Рождения</p>
                  <p class="is-italic has-text-weight-bold">{{ $visit->user->birth_date }}</p>
                </div>
              </div>

              <form class="main-content__adding-form" method="POST" action="{{ url("/admin/visit/$visit->id") }}">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}

              <div class="info-block">
                <p class="info-block-title">Дата Визита</p>
                <input class="input-field datetimepicker" name="visit_date" readonly type="text" value="@if( old('visit_date') !== null ){{ old('visit_date') }}@else{{ $visit->visit_date }}@endif"/>
              </div>

              <div class="info-block">
                <p class="info-block-title">Жалобы</p>
                <textarea class="area-field" name="complaints">@if( old('complaints') !== null ){{old('complaints')}}@else{{$visit->complaints }}@endif</textarea>
              </div>

              <div class="info-block">
                <p class="info-block-title">Диагноз</p>
                <textarea class="area-field" name="diagnosis">@if( old('diagnosis') !== null ){{ old('diagnosis') }}@else{{ $visit->diagnosis }}@endif</textarea>
              </div>
            
              <div class="info-block">
                <p class="info-block-title">Лечение</p>
                <textarea class="area-field" name="treatment">@if( old('treatment') !== null ){{ old('treatment') }}@else{{ $visit->treatment }}@endif</textarea>
              </div>

              <div class="info-block">
                <p class="info-block-title">Рекомендации</p>
                <textarea class="area-field" name="recomendations">@if( old('recomendations') !== null ){{ old('recomendations') }}@else{{ $visit->recomendations }}@endif</textarea>
              </div>

              <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="обновить"/>

              </form>
            </div>


            @include('admin_cabinet.patients-sidebar')

          </div>
        </div>
        <!-- <div class="sidebar"></div> -->
      </div>
</section>
@endsection

@section('page-scripts')
  <script>
    $(document).ready(function () {
      $.datetimepicker.setLocale('ru');

      $.each($('.datetimepicker'), function (i, field) {
        $(field).datetimepicker({
          format:'Y-m-d H:i',
        });
      });
    });
    
  </script>
@endsection