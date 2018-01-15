@extends('admin_cabinet.master')

@section('content')
<section class="main-content review-main">
  <div class="main-content__container patien-reviews-continer">
    <form class="main-content__adding-form" action="{{ url('/admin/question/'.$question['id']) }}" method="POST">
      {{ csrf_field() }}
      <div class="form-field">
        <p class="form-field__name"><a style="font-weight: bold; color: #58647c;" href="{{ url('/admin/patient'.$question->user['id']) }}">{{ $question->user['name'] }}</a> {{ date('d.m.Y', strtotime($question->created_at)) }}</p>
      </div>
      <div class="form-field">
        <p class="form-field__name">Суть Проблемы</p>
        <textarea class="form-field__text-field" cols="8" name="complaints" rows="15">@if( old('complaints') !== null ){{ old('complaints') }}@else{{ $question['complaints'] }}@endif
        </textarea>
      </div>
      <div class="form-field">
        <p class="form-field__name">Ответ</p>
        <textarea class="form-field__text-field" cols="8" name="answer" rows="15">@if( old('answer') !== null ){{ old('answer') }}@else{{ $question['answer'] }}@endif</textarea>
      </div>
      <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Отправить"/></div>      
    </form>
    
    @include('admin_cabinet.patients-sidebar')
    
  </div>
</section>
@endsection

@section('page-scripts')
  <script>
    $.datetimepicker.setLocale('ru');
    // $('#datetimepicker').datetimepicker();
    $.each($('.datetimepicker'), function (i, field) {
      $(field).datetimepicker({});
    });
  </script>
@endsection
