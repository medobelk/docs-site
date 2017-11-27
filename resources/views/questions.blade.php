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
                        <div class="review"><a class="review__name" href="#">Виктория</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Виктория</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
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
                        <div class="review"><a class="review__name" href="#">Виктория</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Виктория</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
                        <div class="review"><a class="review__name" href="#">Виктория</a><span class="review__date">11.8.2017</span>
                          <p class="review__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
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
