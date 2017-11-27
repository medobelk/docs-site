<script>
  $('document').ready(function () {
    var thanks_block = {!! json_encode(session()->get('thanks_block')) !!};
    if( thanks_block == 2 ){
      $('.main-info__left-part').empty();
      $('.main-info__middle-part').empty();

      $('.main-info__left-part').append(`<div class="erorr-404"><img class="erorr-404__image-404" src="img/thanks.png" alt="" role="presentation"/></div>`);
      $('.main-info__middle-part').append(`
		<div class="error-text">
	      <p class="error-text__text"> Я отвечу вам как только смогу.</p>
	      <p class="error-text__text"> Вам на почту прийдет ответ со ссылкой на почту, так же он станет доступен на странице с вопросами.</p>
	      <a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
	    </div>
	  `);
    }
  });
</script>