<div class="sidebar column is-2 has-text-left">
  <div class="visits">
    @foreach( $sidebarVisits as $visit )
      <p>
        <a class="visits__visite" href="{{ url('/cabinet/'.$visit->id) }}">приём {{ date( 'd.m.Y', strtotime($visit->visit_date) ) }}</a>
      </p>
    @endforeach

  </div>
  <div class="control-buttons">
    <ul>
      <li>
        <a class="control-buttons__email-change">изменить почту</a>
      </li>
      <li>
        <a class="control-buttons__pass-change">изменить пароль</a>
      </li>
      <li>
        <a class="control-buttons__phone-change">изменить телефон</a>
      </li>
      <li>
        <a class="control-buttons__reviews-add" href="{{ url('/cabinet/review') }}">оставить отзыв</a>
      </li>
      <li>
        <p class="control-buttons__anonim">/aнонимно</p>
      </li>
    </ul>
  </div>

  <div class="modal" id="phoneChange">
    <div class="modal-background"></div>
    <div class="modal-content">
      <form method="POST" class="is-flex" action="{{ url('cabinet/change-phone') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input class="input" type="text" placeholder="Новый Номер" name="newPhone" value="{{Auth::user()->phone}}">
        <input type="submit" class="has-text-weight-semibold is-uppercase is-size-8 modal-submit" value="Изменить">
      </form>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>

  <div class="modal" id="passChange">
    <div class="modal-background"></div>
    <div class="modal-content">
      <form method="POST" class="is-flex" action="{{ url('cabinet/change-password') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input class="input" type="text" name="newPassword" placeholder="Новый Пароль">
        <input type="submit" class="has-text-weight-semibold is-uppercase is-size-8 modal-submit" value="Изменить">
      </form>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>

  <div class="modal" id="emailChange">
    <div class="modal-background"></div>
    <div class="modal-content">
      <form method="POST" class="is-flex" action="{{ url('cabinet/change-email') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input class="input" type="text" name="newEmail" placeholder="Новая Почта" value="{{Auth::user()->email}}">
        <input type="submit" class="has-text-weight-semibold is-uppercase is-size-8 modal-submit" value="Изменить">
      </form>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>

</section>
