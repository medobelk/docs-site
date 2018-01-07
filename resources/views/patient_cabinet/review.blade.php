@extends('patient_cabinet.master')

@section('content')
<section class="main-content review-main">
  <div class="main-content__container patien-reviews-continer">
    <form class="main-content__adding-form" action="{{ url('/cabinet/add-review') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-field">
        <p class="form-field__name">Имя
        </p><input class="form-field__input-field" placeholder="(можете оставить это поле пустым)" type="text"/>
      </div>
      <div class="form-field">
        <p class="form-field__name">Отзыв
        </p><textarea class="form-field__text-field" cols="8" name="review" rows="10"></textarea>
      </div>
      <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Опубликовать"/>
      </div>
    </form>
    
    @include('patient_cabinet.sidebar')
    
  </div>
</section>
@endsection