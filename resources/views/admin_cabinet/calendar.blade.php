@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-8">
          <div id="calendar" style=""></div>
        </div>
      </div>
      <div class="columns" style="justify-content: center;">
        <div class="column is-4">
          <h4 class="has-text-centered is-size-3 ">Заявки</h4>
          @foreach( $enrolls as $enroll )
          <div class="user-block">
            <div class="info-block">
              <p class="info-block-title">Ф.И.О.</p>
              <p class="is-italic has-text-weight-bold"><a href="{{ url('/admin/patient/'.$enroll->user->id) }}" class="name-link">{{ $enroll->user->name }}</a></p>
            </div>
            <div class="info-block">
              <p class="info-block-title">Номер</p>
              <p class="is-italic">{{ $enroll->user->phone }}</p>
            </div>
            <div class="info-block">
              <p class="info-block-title">Желаемая Дата Время</p>
              <p class="is-italic has-text-weight-bold">{{ date( 'Y-m-d H:i', strtotime($enroll->date)) }}</p>
            </div>
            
            <div class="rd-links is-flex">
              <a href='{{ url("/admin/visit/".$enroll->user->id."/$enroll->id") }}' class="">Записать</a>  
              <form action="{{ url("/admin/enroll/$enroll->id") }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" class="input-as-link" value="Удалить" />
              </form>
            </div>

          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('page-scripts')
  <script src="{{ asset('js/moment-locales.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script>
  <script>
      $(document).ready(function () {
        var events = {!! $calendarData !!};
        var adminUrl = "{{ url('admin') }}";
        $('#calendar').fullCalendar({
          height: 600,
          locale: 'ru',
          timeFormat: 'Hч',
          header: {
            left:   'today prev,next',
            center: 'title',
            right:  'month agendaWeek agendaDay '
          },
          buttonText: {
            today:    'Сегодня',
            month:    'Месяц',
            week:     'Неделя',
            day:      'День',
          },
          eventClick: function(calEvent, jsEvent, view) {
            // console.log(adminUrl+'/'+calEvent.type+'/'+calEvent.id);
            window.location.href = adminUrl+'/'+calEvent.link;
          },
          events: events
        });
      });
  </script>
@endsection