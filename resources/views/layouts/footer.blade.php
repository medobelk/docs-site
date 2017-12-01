<footer>
  <div class="footer-body">
    <div class="footer-item first">
      <p class="footer-item__title">Контакты
      </p><a class="footer-item__telephone-link first">+38(067)
      <SPAN>489 91 34</SPAN></a><a class="footer-item__telephone-link second">+38(048)
      <SPAN>704 37 58</SPAN></a>
      <p class="footer-item__grafic">График работы Пн-Пт с 9:00 до 15:00
      </p>
      <p class="footer-item__address">Семинарская 7,
      </p>
      <p class="footer-item__address last">кабинет 21
      </p>
    </div>
    <div class="footer-item two">
      <p class="footer-item__title">Отзывы пациентов
      </p>
      <DIV class="owl-carousel">
        <DIV class="item">
          <p class="footer-item__name">Юлия
          </p>
          <p class="footer-item__review">Лечила цистит. Самые хорошие впечаления. До Юрия Иосифовича лечилась много лет в нескольких местах. После лечения у Брезицкого несколько лет обострений не было. Однако сейчас появились проблемы, а он поменял место работы и я не могла его найти.Теперь благодаря Вашему сайту, я знаю куда обратиться.
          </p>
        </DIV>
        <DIV class="item">
          <p class="footer-item__name">Иван
          </p>
          <p class="footer-item__review">
            Трихомонаду лечил у многих врачей Одессы. А помог избавиться окончательно Юрий Иосифович. За что благодарен.
          </p>
        </DIV>
      </DIV>
    </div>
    <div class="footer-item three">
      <p class="footer-item__title">Плазмолифтинг
      </p>
      <a href=""><p class="footer-item__review info">Один из новых немедикаментозных методов лечения. Использую при лечении хронических цистита, пиелонефрита, других заболеваний. Уже после 2х процедур пациенты отмечают значительное улучшение состояния. Метод предполагает введение  обогащенной тромбоцитами плазмы самого больного.
      </p></a>
    </div>
  </div>
  <div class="long-footer">
    <div class="container long-inner">
        <p class="long-footer__info-one">2017 &copy; docurolog</p>
        <p class="long-footer__info-two">дизайн и поддержка сайта<img class="foot-ico" src="{{ asset('img/foot-ico.png') }}"/><a class="author-link" href="#">Katrin Briz</a></p>
    </div>
    </div>
</footer>
@section('page-scripts')
<script>

  $(".owl-carousel").owlCarousel({
      items: 1,
      dots: true,
      navigation: true,
      nav:true,
      navText: ["<img src='{{ asset('img/prev.png') }}' alt='' role='presentation'/>","<img src='{{ asset('img/next.png') }}' alt='' role='presentation'/>"],
      loop: true,
  });

</script>
@endsection