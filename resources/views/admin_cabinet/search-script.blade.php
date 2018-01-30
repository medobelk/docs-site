<script>
$(document).ready(function () {
  var currentSearchRequest = null;

  $("#search").keyup(function (event) {
    currentSearchRequest = $.ajax({
      url: '/admin/search',
      type: 'GET',
      data: {'searchString': $('#search').val()},
      beforeSend : function(){
          if(currentSearchRequest != null) {
              currentSearchRequest.abort();
          }
          $('.search-field-ico').remove();
          $('.fa-spin').remove();
          $('span.icon').append('<i class="fa fa-spinner fa-spin fa-lg fa-fw"></i>');
      },
      success: function(users){
        $('.fa-spin').remove();
        $('span.icon').append('<i class="search-field-ico fa fa-search"></i>');
        $('#users').empty();
        if( users.length === 0 ){
          $('#users').append('<p class="form-field__name">Никого не найдено</p>');
          return;
        }
        $.each(users, function (i, user) {
          $('#users').append(`<p><a class="control-buttons__email-change" href="{{ url('/admin/patient') }}/${user.id}">${user.name}</a></p>`);
        });
      },
    });
  });
});
</script>