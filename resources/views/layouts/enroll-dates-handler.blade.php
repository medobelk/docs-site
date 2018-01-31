<script>
	$(document).ready(function () {		
	var availableDatesHours = {!! $availableDatesHours !!};
	// $('#datetimepicker').datetimepicker({
 //        format: 'dd DD MMM YYYY в HH:mm',
 //        minDate: moment("12/10/2017"),
 //        daysOfWeekDisabled: [0,6],
 //        useCurrent: false,
 //        locale: 'uk',
 //        disabledDates: ['2017-12-30'],
 //        disabledTimeIntervals: [[moment({ h: 0 }), moment({ h: 10 })], [moment({ h: 18 }), moment({ h: 24 })]]
 //    });
 	var allowTimes = ['09', '10','11','12','13','14','15','16','17','18'];
 	$.datetimepicker.setLocale('ru');
	$('#datetimepicker').datetimepicker({
		minDate:'+1970/01/02',
		value:'',
		timepickerScrollbar: false,
		dayOfWeekStart: 1,
		disabledWeekDays: [0, 6],
		allowTimes: allowTimes,
		formatTime:'H',
		mask:'9999-12-31 23:00',
		format:'Y-m-d H:i',
		onSelectDate:function(ct,$i){
			
			var searchDate = String(ct.getFullYear()+"-"+ (parseInt(ct.getMonth()) + 1) +"-"+ct.getDate()) , allowedDateTimes = allowTimes;

			if( availableDatesHours[0][searchDate] ){
				availableDatesHours[0][searchDate].forEach( function(busyTime, i) {
					allowedDateTimes = $.grep(allowedDateTimes, function(freeTime) {
						return freeTime != busyTime.split(':')[0];
					});
				});
			}

			$('#datetimepicker').datetimepicker('toggle');
			$('#datetimepicker').datetimepicker('reset');
			$('#datetimepicker').datetimepicker({allowTimes: allowedDateTimes});
			
			$('#datetimepicker').datetimepicker({value: ct});
			$('#datetimepicker').datetimepicker('toggle');
		}
	});

});


</script>