<div class="doctor-form-two">
	<form class="form-body" method="POST" action="{{ url('/create-question') }}">
		{{ csrf_field() }}
		<div class="form-body__title">Задать вопрос</div>
		<input class="form-body__field" name="question_name" value="{{ old('question_name') }}" placeholder="Ваше имя*" type="text"/>
		<input class="form-body__field" name="question_email" value="{{ old('question_email') }}" placeholder="Электронный адрес*" type="text"/>
		<textarea class="form-body__field" name="question_complaints" rows="5" placeholder="Суть проблемы*">{{ old('question_complaints') }}</textarea>
		<input class="form-body__check-box" id="subscride-checkbox" name="question_subscription" type="checkbox" checked>
		<label for="subscride-checkbox" class="form-body__text">Получить ответ на почту</label>
		<input class="form-body__write-btn" type="submit" value="Отправить"/>
	</form>
</div>
