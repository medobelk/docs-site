@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
      <div class="container">
        <div class="block" >
          <div class="columns" style="justify-content: center;">
            <div class="column is-2"></div>
            <div class="column is-4">
              <form class="main-content__adding-form" method="POST" action="{{ url('/admin/patient') }}">
                {{ csrf_field() }}

                <div class="info-block">
                  <p class="info-block-title">Имя</p>
                  <input class="input-field" name="name" type="text" value="{{ old('name') }}" />
                </div>
                <div class="info-block">
                  <p class="info-block-title">Почта</p>
                  <input class="input-field" name="email" type="text" value="{{ old('email') }}"/>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Телефон</p>
                  <input class="input-field" name="phone" type="text" value="{{ old('phone') }}"/>
                </div>
                {{-- @if( $user['id'] !== 0 ) @if( $user['password'] !== null ) Оставьте пустым если не хотите менять @else У пользователя нет пароля! @endif @endif --}}
                <div class="info-block">
                  <p class="info-block-title">Пароль <i id="refreshPass" class="fa fa-refresh" aria-hidden="true"></i></p>
                  <input class="input-field" name="password" type="text" />
                </div>
                <div class="info-block">
                  <p class="info-block-title">Дата Рождения</p>
                  <input class="input-field datetimepicker" name="birth_date" readonly type="text" value="{{ old('birth_date') }}"/>
                </div>

                <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="Создать"/>

              </form>
            </div>


            @include('admin_cabinet.patients-sidebar')

          </div>
        </div>
        <!-- <div class="sidebar"></div> -->
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
      //var user = ;
      {{-- {!! $user !!} --}}
      $.datetimepicker.setLocale('ru');
      $('#datetimepicker').datetimepicker();

      $.each($('.datetimepicker'), function (i, field) {
        $(field).datetimepicker({
          format:'Y-m-d',
          timepicker: false,
          step: 5
        });
        // if( user.id !== 0 ){
        //   $(field).datetimepicker({
        //     value: moment(user.birth_date).format('YYYY-MM-DD')
        //   });
        // }
      });
      
      var passField = $('input[name=password]');
      passField.val(generatePassword()); 

      // if( user.id === 0 ){
      //   passField.val(generatePassword()); 
      // }
      
      $('#refreshPass').click(function () {
          passField.val(generatePassword());
      });
    });
    
  </script>
@endsection