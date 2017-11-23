@extends('layouts.form-master')

@section('content')

  <section class="main-content">
    <div class="main-content__container">
      <form class="main-content__adding-form">
        <div class="form-field">
          <p class="form-field__name">Имя
          </p><input class="form-field__input-field" placeholder="(можете оставить єто поле пустым)" type="text"/>
        </div>
        <div class="form-field">
          <p class="form-field__name">Отзыв
          </p><textarea class="form-field__text-field" name="someTextArea" rows="10"></textarea>
        </div>
        <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Опубликовать"/>
        </div>
      </form>

      @include('layouts.form-sidebar')

    </div>
  </section>

@endsection