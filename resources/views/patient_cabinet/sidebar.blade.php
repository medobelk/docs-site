<section class="sidebar">
  <div class="visits">
    @foreach( Auth::user()->visits()->get() as $visit )
      <a class="visits__visite" href="{{ url('/cabinet/'.$visit->id) }}">приём {{ date( 'd.m.Y', strtotime($visit->visit_date) ) }}</a>
    @endforeach

  </div>
  <div class="control-buttons">
    <a class="control-buttons__email-change" href="#">изменить почту</a>
    <a class="control-buttons__pass-change" href="#">изменить пароль</a>
    <a class="control-buttons__reviews-add" href="{{ asset('/cabinet-review') }}">оставить отзыв</a>
    <p class="control-buttons__anonim">/aнонимно</p>
  </div>
</section>