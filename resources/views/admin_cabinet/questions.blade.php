@extends('admin_cabinet.master')

@section('content')
<section class="main-content qusetion-main">
  <div class="main-content__container question-continer">
    <div class="main-part">
      <div class="last-questions">
        @foreach($questions as $question)
          <div class="question" style="overflow-wrap: break-word;">
            <p class="question__date">
              <a style="font-weight: bold; @if( is_null($question->answer) ) color: #e00 @endif" href="{{ url('/admin/patient/'.$question->user['id']) }}">{{ $question->user['name'] }}</a>
              {{ date('d.m.Y', strtotime($question->created_at) ) }}
            </p>
            <p class="question__text">
              {{ $question->complaints }}
            </p>
            @if( is_null( $question->answer ) )
              <a class="question__answer-btn" href='{{ url("/admin/question/$question->id") }}'>Ответить</a>
            @else
              <a class="question__answer-btn" href='{{ url("/admin/question/$question->id") }}'>Редактировать</a>
            @endif
              <a class="question__answer-btn" href='{{ url("/admin/delete-question/$question->id") }}'>Удалить</a>
          </div>
        @endforeach
      </div>
    </div>

    @include('admin_cabinet.patients-sidebar')

  </div>
</section>
@endsection
