@extends('admin_cabinet.master')

@section('content')
<section class="main-content review-main">
  <div class="main-content__container patien-reviews-continer">
    <form class="main-content__adding-form" method="POST" action="
    @if( $user['id'] !== 0 )
      {{ url('/admin/patients/'.$user['id']) }}  
    @else
      {{ url('/admin/patients') }}  
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
        <input class="form-field__input-field" name="password" type="text" placeholder="@if( isset($user) )Оставьте пустым если не хотите менять@endif" value="@if( old('password') !== null ){{ old('password') }}@endif"/>
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
    
    <section class="sidebar">
      <div class="visits">
        @foreach( $users as $user )
          <div style="margin-bottom: 15px;">
            <a class="visits__visite" style="font-family: 'Segoe UI', segoe, serif; text-decoration: none; font-size: 1em;" href="{{ url('admin/patients/'.$user->id) }}">{{ $user->name}}</a>
          </div>
        @endforeach
      </div>
    </section>
    
  </div>
</section>
@endsection

@section('page-scripts')
  <script>
    function generatePassword() {        
        var length = Math.round( 8 - 0.5 + Math.random() * (16 - 8 + 1) ),
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
          mask:'9999-12-31 23:00',format:'Y-m-d H:i',
        });
      });
      var passField = $('input[name=password]');
      if( !user ){
        passField.val(generatePassword());  
      }
      
      $('#refreshPass').click(function () {
          passField.val(generatePassword());
      });
    });
  </script>
@endsection