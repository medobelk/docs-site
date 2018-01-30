@extends('patient_cabinet.master')

@section('content')

<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">

          <form class="adding-form" action="{{ url('/cabinet/add-review') }}" method="POST">
            {{ csrf_field() }}

            <div class="info-block">
              <p class="info-block-title">Имя</p>
              <ul>
                <li>
                  <input class="" type="radio" id="anonim" value="anonim" name="name">
                  <label for="anonim">Анонимно</label>
                </li>
                <li>
                  <input class="" type="radio" id="nominal" value="nominal" name="name">
                  <label for="nominal">Именной</label>
                </li>
              </ul>
            </div>
          
            <div class="info-block">
              <p class="info-block-title">Отзыв</p>
              <textarea class="area-field" name="review">{{old('review')}}</textarea>
            </div>

            <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="Опубликовать"/>

          </form>

        </div>

        @include('patient_cabinet.sidebar')

      </div>
    </div>
    <!-- <div class="sidebar"></div> -->
  </div>
</section>
@endsection