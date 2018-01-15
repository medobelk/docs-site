<script>
$(document).ready(function () {
  $("#search").keyup(function (event) {
    $.ajax({
      url: '/admin/search',
      type: 'GET',
      data: {'searchString': $('#search').val()},
      success: function(users){
        $('#users').empty();
        if( users.length === 0 ){
          $('#users').append('<p class="form-field__name">Никого не найдено</p>');
          return;
        }
        $.each(users, function (i, user) {
          $('#users').append(`<a class="control-buttons__email-change" href="{{ url('/admin/patient') }}/${user.id}">${user.name}</a>`);
        });
      },
    });
  });
});
</script>