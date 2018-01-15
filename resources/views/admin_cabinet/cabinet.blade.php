@extends('admin_cabinet.master')

@section('content')
<section class="main-content review-main">
  <div class="main-content__container patien-reviews-continer">
    <form class="main-content__adding-form" method="POST" action="
    @if( $user['id'] !== 0 )
      {{ url('/admin/patient/'.$user['id']) }}  
    @else
      {{ url('/admin/patient') }}  
    @endif
    ">
      {{ csrf_field() }}
      <div class="form-field">
        <p class="form-field__name">Имя</p>
        <input class="form-field__input-field" name="name" type="text" value="@if( old('name') !== null ){{ old('name') }}@else{{ $user['name'] }}@endif" />
      </div>
      <div class="form-field">
        <p class="form-field__name">Почта</p>
        <input class="form-field__input-field" name="email" type="text" value="@if( old('email') !== null ){{ old('email') }}@else{{ $user['email'] }}@endif"/>
      </div>
      <div class="form-field">
        <p class="form-field__name">Пароль <i id="refreshPass" class="fa fa-refresh" aria-hidden="true"></i></p>
        <input class="form-field__input-field" name="password" type="text" placeholder="@if( $user['id'] !== 0 )Оставьте пустым если не хотите менять@endif" value="@if( old('password') !== null ){{ old('password') }}@endif"/>
      </div>
      <div class="form-field">
        <p class="form-field__name">Телефон</p>
        <input class="form-field__input-field" name="phone" type="text" value="@if( old('phone') !== null ){{ old('phone') }}@else{{ $user['phone'] }}@endif"/>
      </div>
      <div class="form-field">
        <p class="form-field__name">Дата Рождения</p>
        <input class="form-field__input-field datetimepicker" name="birth_date" readonly type="text" value="@if( old('birth_date') !== null ){{ old('birth_date') }}@else{{ $user['birth_date'] }}@endif"/>
      </div>
      <div class="form-field"><input class="form-field__submit-btn" type="submit" value="Опубликовать"/></div>      
    </form>
    
    @include('admin_cabinet.patients-sidebar')
    
  </div>
</section>
@endsection

@section('page-scripts')
  <script>
    function generatePassword() {        
        var length = 8;//Math.round( 8 - 0.5 + Math.random() * (16 - 8 + 1) ),
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
            
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }
    $(document).ready(function () {
      var user = {!! $user !!};
      $.datetimepicker.setLocale('ru');
      // $('#datetimepicker').datetimepicker();

      $.each($('.datetimepicker'), function (i, field) {
        $(field).datetimepicker({
          format:'Y-m-d',
          timepicker: false,
        });
        if( user.id !== 0 ){
          $(field).datetimepicker({
            value: moment(user.birth_date).format('YYYY-MM-DD')
          });
        }
      });
      var passField = $('input[name=password]');

      if( user.id === 0 ){
        passField.val(generatePassword()); 
      }
      
      $('#refreshPass').click(function () {
          passField.val(generatePassword());
      });
    });
    
  </script>
@endsection