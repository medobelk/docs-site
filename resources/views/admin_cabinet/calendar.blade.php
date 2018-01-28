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