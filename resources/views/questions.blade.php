@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

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
                            <span class="review__date">{{ date('d.m.Y', strtotime($question["created_at"])) }}</span>
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
                            <span class="review__date">{{ date('d.m.Y', strtotime($question["created_at"])) }}</span>
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
              <div class="main-info__right-part">
                
                @include('layouts.question-form')

              </div>
            </div>
          </div>
          
		  @include('layouts.sidebar')

        </div>
      </section>

@endsection
