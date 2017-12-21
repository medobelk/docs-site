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

                          <div class="review"><a class="review__name" href=''>{{ $question->name }}</a>
                            <span class="review__date">{{ date('j.n.Y', strtotime($question->created_at) ) }}</span>
                            <p class="review__text">{{ $question->complaints }}</p>
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
                        @if( isset($answer) )
                        <div class="review"><a class="review__name">Ответ</a>
                          <p class="review__text">{{ $answer->body }}</p>
                        </div>
                        @else
                        <div class="review"><p class="review__name">Ответ</p>
                          <p class="review__text">Ответа пока нет</p>
                        </div>
                        @endif
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
