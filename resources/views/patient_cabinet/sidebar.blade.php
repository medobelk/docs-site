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
      <a class="control-buttons__email-change" href="#">изменить почту</a>
      </li>
      <li>
      <a class="control-buttons__pass-change" href="#">изменить пароль</a>
      </li>
      <li>
      <a class="control-buttons__reviews-add" href="{{ url('/cabinet/review') }}">оставить отзыв</a>
      </li>
      <li>
      <p class="control-buttons__anonim">/aнонимно</p>
      </li>
    </ul>
  </div>
</section>
