@extends('patient_cabinet.master')

@section('content')

<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">
          <form class="main-content__adding-form" method="POST" action="{{ url("/cabinet/add-question") }}  ">
            {{ csrf_field() }}
            <div class="info-block">
              <p class="info-block-title">Суть проблемы</p>
              <textarea class="area-field" name="question"></textarea>
            </div>
  
            <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="Спросить"/>
            
            <div class="info-block">
              <p class="info-block-title has-text-weight-semibold" style="margin-top: 20px;">Предыдущие вопросы</p>
            </div>

            @foreach($questions as $question)
              <div class="visit-info-block">
                <p class="info-block-title has-text-weight-semibold">
                  {{ date('d.m.Y', strtotime($question->created_at) ) }}
                </p>
                <p>{{ $question->complaints }}</p>
              </div>
            @endforeach

          </form>
        </div>
        
        @include('patient_cabinet.sidebar')

      </div>
    </div>
    
  </div>
</section>
@endsection