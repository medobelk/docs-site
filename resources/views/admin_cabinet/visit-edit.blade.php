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
                  <p class="is-italic has-text-weight-bold"><a href="{{ url('/admin/patient/'.$visit->user->id) }}" class="name-link">{{ $visit->user->name }}</a></p>
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

              <form enctype="multipart/form-data" class="main-content__adding-form" method="POST" action="{{ url("/admin/visit/$visit->id") }}">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <input type="hidden" name="userId" value="{{$visit->user['id']}}">
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

              <div class="info-block">
                <p class="info-block-title">Анализы</p>
                <div class="is-flex analyzes">

                  @foreach( $visit->analyzes as $analyze )
                    <div class="analyze">
                      <div class="analyze-info-wrapper">
                        <span class="icon is-large">
                          <i class="fa fa-3x fa-file-text-o" aria-hidden="true"></i>
                        </span>
                        <p class="analyze-name">
                          {{ $analyze->name }}
                        </p>
                      </div>
                      <div class="analyze-icons-wrapper">
                        <span class="icon is-large">
                          <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                        </span>
                        <span class="icon is-large analyzeFile">
                          <input type="hidden" name="analyze-exist-{{$analyze->id}}">
                          <input type="file" class="analyze-file-input" name="analyze-exist-{{$analyze->id}}">
                          <i class="fa fa-2x fa-download" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  @endforeach

                </div>
                
                <div class="new-analyze">
                  <div class="new-analyze-icons-wrapper">
                    <span class="icon is-large">
                      <input type="file" class="analyze-file-input" id="new-analyze-input">
                      <i class="fa fa-3x fa-file-text-o" id="new-analyze" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>

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
          step: 5
        });
      });
    });

    $('#new-analyze').click(function () {
      $('#new-analyze-input').trigger('click');
    });

    $(".analyzes").on('click', '.fa-download', function (event) {
      $(this).parent().find('input[type=file]').trigger('click');
    });

    $(".analyzes").on('click', '.fa-times', function (event) {
      $( event.target).closest('.analyze').remove();
    });

    $('.analyzes').on('change', 'input[type=file]', function (event) {
      $( $( event.target).closest('.analyze').find('.analyze-name') ).text($(this).prop('files')[0].name);
      $( $( event.target).closest('.analyze').find('input[type=hidden]') ).attr('value', 'edit');
    })

    $('#new-analyze-input').change(function () {
      var newAnalyzeInput = $('#new-analyze-input').clone();
      var fileName = newAnalyzeInput.prop('files')[0].name;

      newAnalyzeInput.attr('id', '');
      newAnalyzeInput.attr('name', 'analyzes[]');
      
      $('.analyzes').append(`
        <div class="analyze">
          <div class="analyze-info-wrapper">
            <span class="icon is-large">
              <i class="fa fa-3x fa-file-text-o" aria-hidden="true"></i>
            </span>
            <p class="analyze-name">
              ${fileName}
            </p>
          </div>
          <div class="analyze-icons-wrapper">
            <span class="icon is-large">
              <i class="fa fa-2x fa-times" aria-hidden="true"></i>
            </span>
            <span class="icon is-large analyzeFile">
              <i class="fa fa-2x fa-download" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      `);

      $('.analyzeFile:last').prepend(newAnalyzeInput);
    });
    
  </script>
@endsection