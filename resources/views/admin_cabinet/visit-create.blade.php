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
                  <p class="is-italic has-text-weight-bold">{{ $user->name }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Электронный Адрес</p>
                  <p class="is-italic">{{ $user->email }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Номер</p>
                  <p class="is-italic">{{ $user->phone }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Дата Рождения</p>
                  <p class="is-italic has-text-weight-bold">{{ $user->birth_date }}</p>
                </div>
              </div>

              <form class="main-content__adding-form" method="POST" action="{{ url("/admin/visit/$user->id") }}  ">
              {{ csrf_field() }}
              <input type="hidden" name="userId" value="{{$user->id}}">
              <div class="info-block">
                <p class="info-block-title">Дата Визита</p>
                <input class="input-field datetimepicker" name="visit_date" readonly type="text" value="{{old('visit_date')}}"/>
              </div>

              <div class="info-block">
                <p class="info-block-title">Жалобы</p>
                <textarea class="area-field" name="complaints">{{old('complaints')}}</textarea>
              </div>

              <div class="info-block">
                <p class="info-block-title">Диагноз</p>
                <textarea class="area-field" name="diagnosis">{{old('diagnosis')}}</textarea>
              </div>
            
              <div class="info-block">
                <p class="info-block-title">Лечение</p>
                <textarea class="area-field" name="treatment">{{old('treatment')}}</textarea>
              </div>

              <div class="info-block">
                <p class="info-block-title">Рекомендации</p>
                <textarea class="area-field" name="recomendations">{{old('recomendations')}}</textarea>
              </div>

              <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="Записать"/>

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