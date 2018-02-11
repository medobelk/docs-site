@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns">
        <div class="column is-1"></div>
        <div class="column is-6">
          @foreach($questions as $question)
            <div class="visit-info-block">
              <p class="info-block-title has-text-weight-semibold">
                <a class="patient-link" style="@if( is_null($question->answer) || strlen($question->answer) === 0 ) color: #e00 @endif" href="{{ url('/admin/patient/'.$question->user['id']) }}">
                  {{ $question->name }}
                </a>
                {{ date('d.m.Y', strtotime($question->created_at) ) }}
              </p>
              <p>{{ $question->complaints }}</p>
              <div class="is-clearfix rd-links">
                @if( is_null( $question->answer ) || strlen($question->answer) === 0 )
                  <a class="is-pulled-left" href='{{ url("/admin/question/$question->id") }}'>Ответить</a>
                @else
                  <a class="is-pulled-left" href='{{ url("/admin/question/$question->id") }}'>Редактировать</a>
                @endif
                  <a class="is-pulled-right" href='{{ url("/admin/delete-question/$question->id") }}'>Удалить</a>
              </div>
            </div>

          @endforeach
        </div>

        @include('admin_cabinet.patients-sidebar')

      </div>
    </div>
    <!-- <div class="sidebar"></div> -->
  </div>
</section>
@endsection
