@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">

          <form class="main-content__adding-form" action="{{ url('/admin/question/'.$question['id']) }}" method="POST">
            {{ csrf_field() }}
            <div class="info-block">
              <p class="info-block-title"><a style="font-weight: bold; color: #58647c;" href="{{ url('/admin/patient'.$question->user['id']) }}">{{ $question->user['name'] }}</a> {{ date('d.m.Y', strtotime($question->created_at)) }}</p>
            </div>

            <div class="info-block">
              <p class="info-block-title">Суть Проблемы</p>
              <textarea class="area-field" name="complaints">@if( old('complaints') !== null ){{ old('complaints') }}@else{{ $question['complaints'] }}@endif</textarea>
            </div>
            <div class="info-block">
              <p class="info-block-title">Ответ</p>
              <textarea class="area-field" name="answer">@if( old('answer') !== null ){{ old('answer') }}@else{{ $question['answer'] }}@endif</textarea>
            </div>

            <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="обновить"/>
          
          </form>
        </div>

        @include('admin_cabinet.patients-sidebar')

      </div>
    </div>
    
  </div>
</section>
@endsection

@section('page-scripts')
  <script>
    $.datetimepicker.setLocale('ru');
    $.each($('.datetimepicker'), function (i, field) {
      $(field).datetimepicker({step: 5});
    });
  </script>
@endsection
