@extends('patient_cabinet.master')

@section('content')
<section class="main-content qusetion-main">
  <div class="main-content__container question-continer">
    <div class="main-part">
      <form class="adding-form" action="{{ url('/cabinet-add-question') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-field">
          <p class="form-field__name">Суть проблемы
          </p><textarea class="form-field__text-field" rows="12"  name="question"></textarea>
        </div>
        <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Спросить"/>
        </div>
      </form>
      <div class="last-questions">
        <div class="last-questions__title">Предыдущие вопросы
        </div>
        @foreach($questions as $question)
          <div class="question">
            <p class="question__date">
              {{ $question->created_at }}
            </p>
            <p class="question__text">
              {{ $question->complaints }}
            </p>
            <a class="question__answer-btn" href='{{ url("/QA/getlist/question/$question->id") }}'>Ответ</a>
          </div>
        @endforeach
        <!-- <div class="question">
          <p class="question__date">11.8.2017
          </p>
          <p class="question__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
          </p><a class="question__answer-btn" href="#">Ответ</a>
        </div>
        <div class="question">
          <p class="question__date">11.8.2017
          </p>
          <p class="question__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
          </p><a class="question__answer-btn" href="#">Ответ</a>
        </div> -->
      </div>
    </div>

    @include('patient_cabinet.sidebar')

  </div>
</section>
@endsection