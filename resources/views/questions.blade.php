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
                          <div class="review"><a class="review__name" href='{{ url('/QA/getlist/question/' . $question["id"] ) }}'>{{ $question["name"] }}</a>
                            <span class="review__date">{{ $question["created_at"] }}</span>
                            <p class="review__text">
                              {{ $question["complaints"] }}
                            </p>
                          </div>
                        @endforeach
                        <!-- <div class="review"><a class="review__name" href="#">Виктория</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Василий</a><span class="review__date">11.5.2017</span>
                          <p class="review__text">Проходил обследование в Частной клинике, и у меня нашли заболевание. Хотели прописать мне лечение но увы оно оказалось очень дорогим для меня. Врач сказал что это из за того что они лечат зарубежными препаратами которых в Украине нет. А альтернативы мне не предложили. Вот и решил обратится к ван, но к сожалению нет возможности попасть к вам на приём. Могу ли я отправить вам результаты своего обследования на электронную почту. либо связаться с вами по телефону и все обсудить?
                          </p>
                        </div> -->
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
                          <div class="review"><a class="review__name" href='{{ url('/QA/getlist/question/' . $question["id"] ) }}'>{{ $question["name"] }}</a>
                            <span class="review__date">{{ $question["created_at"] }}</span>
                            <p class="review__text">
                              {{ $question["complaints"] }}
                            </p>
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
