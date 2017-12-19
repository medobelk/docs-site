<script>
  $('document').ready(function () {
    var form_errors = {!! json_encode(session()->get('form_errors')) !!};
    if( form_errors ){
      $.each(form_errors, function (field_name, field_error) {
        $('input[name='+field_name+']').css('border', '1px solid red');
        $('textarea[name='+ field_name +']').css('border', '1px solid red');
      });
    }
  });
</script>