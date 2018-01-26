<script>
  $('document').ready(function () {
    var form_errors = {!! json_encode(session()->get('form_errors')) !!};
    if( form_errors ){
      $.each(form_errors, function (field_name, field_error) {
      	if( field_name === 'g-recaptcha-response' ){
      		$('<p class="form-body__text" style="color:red">Ошибка Captcha отправте снова</p>').insertAfter($('form .g-recaptcha'));
      	}
        $('input[name='+field_name+']').css('border', '1px solid red');
        $('textarea[name='+ field_name +']').css('border', '1px solid red');
      });
    }
  });
</script>