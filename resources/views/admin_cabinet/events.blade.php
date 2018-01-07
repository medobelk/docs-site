@extends('admin_cabinet.master')

@section('content')
<section class="main-content review-main">
  <div class="main-content__container patien-reviews-continer">
    <form class="main-content__adding-form" action="
    @if( $event['id'] !== 0 )
      {{ url('/admin/events/'.$event['id']) }}  
    @else
      {{ url('/admin/events') }}  
    @endif
    
    " method="POST">
      {{ csrf_field() }}
      <div class="form-field">
        <p class="form-field__name">Название События</p>
        <input class="form-field__input-field" name="name" type="text" value="@if( old('name') !== null ){{ old('name') }}@else{{ $event['name'] }}@endif" />
      </div>
      <div class="form-field">
        <p class="form-field__name">Дата Начала События</p>
        <input class="form-field__input-field datetimepicker" name="start_date" readonly type="text" value="@if( old('start_date') !== null ){{ old('start_date') }}@else{{ $event['event_date_start'] }}@endif
        "/>
      </div>
      <div class="form-field">
        <p class="form-field__name">Дата Конца События</p>
        <input class="form-field__input-field datetimepicker" name="end_date" readonly type="text" value="@if( old('end_date') !== null ){{ old('end_date') }}@else{{ $event['event_date_end'] }}@endif
        "/>
      </div>
      <div class="form-field">
        <p class="form-field__name">Описание</p>
        <textarea class="form-field__text-field" cols="8" name="description" rows="10">@if( old('description') !== null ){{ old('description') }}@else{{ $event['description'] }}@endif
        </textarea>
      </div>
      <div class="form-field">
        <p class="form-field__name">Содержание</p>
        <textarea class="form-field__text-field" cols="8" name="body" rows="10">@if( old('body') !== null ){{ old('body') }}@else{{ $event['body'] }}@endif</textarea>
      </div>
      <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Опубликовать"/></div>      
    </form>
    
    <section class="sidebar">
      <div class="visits">
        @foreach( $events as $event )
          <div style="margin-bottom: 30px;">
            <p style="font-family: 'Segoe UI', segoe, serif; font-size: 1em; margin-bottom: 5px; color: #6d6d6d; font-weight: 600;">{{ $event->name }}</p>
            <a class="visits__visite" style="font-family: 'Segoe UI', segoe, serif; font-size: 1em;" href="{{ url('/admin/events/'.$event->id) }}">Редактировать</a>
          </div>
        @endforeach
      </div>
    </section>
    
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