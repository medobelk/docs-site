<script>
	var availableDatesHours = {!! $availableDatesHours !!};
	console.log(availableDatesHours);
	// $('#datetimepicker').datetimepicker({
 //        format: 'dd DD MMM YYYY в HH:mm',
 //        minDate: moment("12/10/2017"),
 //        daysOfWeekDisabled: [0,6],
 //        useCurrent: false,
 //        locale: 'uk',
 //        disabledDates: ['2017-12-30'],
 //        disabledTimeIntervals: [[moment({ h: 0 }), moment({ h: 10 })], [moment({ h: 18 }), moment({ h: 24 })]]
 //    });
 	var allowTimes = ['10','11','12','13','14','15','16','17','18'];
 	$.datetimepicker.setLocale('ru');
	$('#datetimepicker').datetimepicker({
		minDate:'+1970/01/02',
		value:'',
		timepickerScrollbar: false,
		dayOfWeekStart: 1,
		disabledWeekDays: [0, 6],
		allowTimes: allowTimes,
		onSelectDate:function(ct,$i){
			
			var searchDate = String(ct.getFullYear()+"-"+ (parseInt(ct.getMonth()) + 1) +"-"+ct.getDate()) , allowedDateTimes = allowTimes;

			if( availableDatesHours[0][searchDate] ){
				availableDatesHours[0][searchDate].forEach( function(dis, i) {
					allowedDateTimes = $.grep(allowedDateTimes, function(value) {
						return value != dis.split(':')[0];
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

	


</script>