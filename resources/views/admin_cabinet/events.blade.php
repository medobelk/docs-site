@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">
          <form class="main-content__adding-form" action="
          @if( $event['id'] !== 0 )
            {{ url('/admin/events/'.$event['id']) }}  
          @else
            {{ url('/admin/events') }}  
          @endif
          " method="POST">
          {{ csrf_field() }}
          <div class="info-block">
            <p class="info-block-title">Название</p>
            <input class="input-field" name="name" type="text" value="@if( old('name') !== null ){{ old('name') }}@else{{ $event['name'] }}@endif" />
          </div>
          <div class="info-block">
            <p class="info-block-title">Дата Начала События</p>
            <input class="input-field datetimepicker" name="start_date" readonly type="text" value="@if( old('start_date') !== null ){{ old('start_date') }}@else{{ $event['event_date_start'] }}@endif
            "/>
          </div>
          <div class="info-block">
            <p class="info-block-title">Дата Конца События</p>
            <input class="input-field datetimepicker" name="end_date" readonly type="text" value="@if( old('end_date') !== null ){{ old('end_date') }}@else{{ $event['event_date_end'] }}@endif
            "/>
          </div>

          <div class="info-block">
            <p class="info-block-title">Описание</p>
            <textarea class="area-field" cols="8" name="description" rows="10">@if( old('description') !== null ){{ old('description') }}@else{{ $event['description'] }}@endif
            </textarea>
          </div>
          <div class="info-block">
            <p class="info-block-title">Содержание</p>
            <textarea class="area-field" cols="8" name="body" rows="10">@if( old('body') !== null ){{ old('body') }}@else{{ $event['body'] }}@endif</textarea>
          </div>

          <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="Опубликовать"/>   
          </form>
        </div>
    
        <section class="sidebar">
            @foreach( $events as $event )
              <div class="info-block">
                <p class="has-text-weight-semibold">{{ $event->name }}</p>
                <a class="" href="{{ url('/admin/events/'.$event->id) }}">Редактировать</a>
              </div>
            @endforeach
        </section>

      </div>
    </div>
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