<script src="{{ asset('js/moment-locales.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script>
<script>
    $(document).ready(function () {
    	var events = {!! $calendarData !!};
    	console.log(events);
		$('#calendar').fullCalendar({
			height: 450,
			locale: 'ru',
			timeFormat: 'Hч',
			events: events,
		});
    });
</script>