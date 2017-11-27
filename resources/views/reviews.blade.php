@extends('layouts.master')

@section('content')
	<section class="all-reviews">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')

            <div class="main-info">
              <div class="main-info__left-part">
                <div class="reviws-list">
                  <div class="reviws-list__reviws">
                    <div class="reviws-body">
                      <div class="last-reviews">
                        <div class="review"><a class="review__name" href="#">Иван</a>
                          <p class="review__text">Трихомонаду лечил у многих врачей Одессы. А помог избавиться окончательно Юрий Иосифович. За что благодарен.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Алексей</a>
                          <p class="review__text">
                            Мне 21 год. В связи с фимозом хотел делать обрезание, но Юрий Иосифович порекомендовал не удалять полностью, а сделать пластику крайней плоти.Прошёл месяц после операции - результатом доволен. Личная жизнь наладилась. Большая мужская благодарность доктору.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Анонимно</a>
                          <p class="review__text">Мне помог. На бланке написано, что исследование делает доктор Кутковец С.Л. Это военный госпиталь.
                          </p>
                        </div>
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
                        <div class="review"><a class="review__name" href="#">Наталья</a>
                          <p class="review__text">Лечилась у вас на Бугазе летом вместе с Юк. Тогда все прошло без проблем. Теперь видя как она страдает и лечится безуспешно понимаю как легко тогда отделалась. За что большое вам спасибо
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Юк</a>
                          <p class="review__text">Более 3х лет назад лечила у вас трихомониаз. Все эти годы чувствовала себя хорошо. Тогда вылечилась за две недели. Сейчас с партнером лечимся месяц. Перепили гору таблеток, эффекта нет, трихомонады обнаруживаются. Выделения есть, дискомфорт при мочеиспускании сохраняется, жаль, что ума не хватило обратиться к вам сразу. Обращались на ваш сайт, телефон 7116501 молчит. Теперь я понимаю как хорошо пролечилась в первый раз, практически бесплатно. За что с опозданием вас благодарю.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Николай</a>
                          <p class="review__text">Пролечил простатит. Успешно. Не дорого. Спасибо.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__right-part">

				        @include('layouts.enroll-form')
                
              </div>

            </div>
          </div>
          
		      @include('layouts.sidebar')

        </div>

      </section>
@endsection