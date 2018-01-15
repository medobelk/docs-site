@extends('admin_cabinet.master')

@section('content')
<section class="main-content review-main">
  <div class="main-content__container patien-reviews-continer">
    
    <div id="calendar" style="background-color: white;"></div>
    
  </div>
</section>
@endsection

@section('page-scripts')
  <script src="{{ asset('js/moment-locales.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script>
  <script>
      $(document).ready(function () {
        var events = {!! $calendarData !!};
        console.log(events);
        $('#calendar').fullCalendar({
          height: 600,
          locale: 'ru',
          timeFormat: 'Hч',
          header: {
            left:   'today prev,next',
            center: 'title',
            right:  'month agendaWeek agendaDay '
          },
          events: events
        });
      });
  </script>
@endsection