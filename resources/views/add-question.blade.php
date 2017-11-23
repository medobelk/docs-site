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
      <section class="sidebar">
        <div class="visits"><a class="visits__visite" href="#">Приём 8.7.2015</a><a class="visits__visite" href="#">Приём 9.10.2015</a><a class="visits__visite" href="#">Приём 4.6.2017</a>
        </div>
        <div class="control-buttons"><a class="control-buttons__email-change" href="#">Изменить почту</a><a class="control-buttons__pass-change" href="#">Изменить пароль</a><a class="control-buttons__reviews-add" href="#">Оставить отзыв</a>
          <p class="control-buttons__anonim">/aнонимно
          </p>
        </div>
      </section>
    </div>
  </section>

@endsection