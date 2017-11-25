<div class="sidebar">
  <div class="newses">
    @foreach($events as $event)
      <div class="news">
        <p class="news__date">{{ $event->event_date }}</p>
        <a class="news__name" href="">{{ $event->name }}</a>
        <p class="news__text">{{ $event->body }}</p>
      </div>
    @endforeach
    <!-- <div class="news">
      <p class="news__date">10.11
      </p><a class="news__name" href="">Урологическая конференция</a>
      <p class="news__text">Принял учстие в конференции учстие в конференци
      </p>
    </div>
    <div class="news">
      <p class="news__date">10.11
      </p><a class="news__name" href="">Урологическая конференция</a>
      <p class="news__text">Принял учстие в конференции учстие в конференци
      </p>
    </div> -->
  </div>
</div>