@extends('layouts.master')
@section('content')
	<section class="all-questions">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')

            <div class="main-info">
              <div class="main-info__left-part">
                <div class="reviws-list">
                  <div class="reviws-list__reviws">
                    <div class="reviws-body">
                      <div class="last-reviews">
                        
                        @foreach( $questionsLeftPart as $key => $question)
                          <div class="review"><span class="review__name" href=''>{{ $question["name"] }}</span>
                            <span class="review__date">{{ $question["created_at"] }}</span>
                            <p class="review__text">
                              {{ $question["complaints"] }}
                            </p>
                            <p ><a class="otvet-btn" href="{{ url('/QA/getlist/question/' . $question['id'] ) }}">Ответ</a></p>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__middle-part">
                <div class="reviws-list">
                  <div class="reviws-list__reviws">
                    <div class="reviws-body">
                      <div class="last-reviews">

                        @foreach( $questionsMiddlePart as $key => $question)
                          <div class="review"><span class="review__name" href=''>{{ $question["name"] }}</span>
                            <span class="review__date">{{ $question["created_at"] }}</span>
                            <p class="review__text">
                              {{ $question["complaints"] }}
                            </p>

                            <p ><a class="otvet-btn" href="{{ url('/QA/getlist/question/' . $question['id'] ) }}">Ответ</a></p>
                          </div>
                        @endforeach
                        <!-- <div class="review"><a class="review__name" href="#">Константин</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">Здравствуйте! У меня боли при половом акте. Крайняя плоть не эластична (в детстве она приростала к головке. Рекомендовали обрезание. Мне 45. Возможно ли это. Какова стоимость? Спасибо.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Лена</a><span class="review__date">11.5.2017</span>
                          <p class="review__text">Пиелонефрит хронический,чем лечить и как, на данный момент боли и резь в конце мочеиспускания, в туалет хочется не часто.Тупая боль в низу живота и в области почек,температуры нет.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Игорь</a><span class="review__date">11.5.2017</span>
                          <p class="review__text">Добрый день! Мне 36 лет. У меня периодически воспаляется крайняя плоть, появляются трещины и воспаление. В добавок ко всему у меня сахарный диабет 1 типа. Я бы хотел произвести обрезание. меня в первую очередь интересуют вопросы: Болезненность операции, стоимость, восстановление после операции. Спасибо жду ответа.
                          </p>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__right-part">
                
                @include('layouts.question-form')

              </div>
            </div>
          </div>
          
		  @include('layouts.sidebar')

        </div>
      </section>

@endsection
