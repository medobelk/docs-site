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
                        @for($i = 0; $i < 3; $i++)
                        <div class="review">
                          <a class="review__name" href="#">
                            @if( $reviews[$i]->authority == 'USER' )
                              {{ $reviews[$i]->user->name }}
                            @else
                              {{ 'Аноним' }}
                            @endif
                          </a>
                          <p class="review__text">
                            {{ $reviews[$i]->body }}
                          </p>
                        </div>
                        @endfor
                        <!-- <div class="review"><a class="review__name" href="#">Алексей</a>
                          <p class="review__text">
                            Мне 21 год. В связи с фимозом хотел делать обрезание, но Юрий Иосифович порекомендовал не удалять полностью, а сделать пластику крайней плоти.Прошёл месяц после операции - результатом доволен. Личная жизнь наладилась. Большая мужская благодарность доктору.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Анонимно</a>
                          <p class="review__text">Мне помог. На бланке написано, что исследование делает доктор Кутковец С.Л. Это военный госпиталь.
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
                        @for($i = 3; $i < 6; $i++)
                        <div class="review">
                          <a class="review__name" href="#">
                            @if( $reviews[$i]->authority == 'USER' )
                              {{ $reviews[$i]->user->name }}
                            @else
                              {{ 'Аноним' }}
                            @endif
                          </a>
                          <p class="review__text">
                            {{ $reviews[$i]->body }}
                          </p>
                        </div>
                        @endfor
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