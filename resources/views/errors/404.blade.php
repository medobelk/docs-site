@extends('layouts.master')
@section('content')
<section class="merhods">
  <div class="container">
    <div class="main">
      <div class="questions-list"><a class="questions-list__item item-one" href="zabolevania-womans.html"><span class="questions-list__title">Заболевания у женщин</span>
        <div class="img-text"><img class="img-text__img no-hover" src="img/top-pne.png" alt="" role="presentation"/><img class="img-text__img hover-image hide" src="img/top-pne-hover.png" alt="" role="presentation"/>
          <ol class="img-text__list">
            <LI>1. Учащенное болезненное мочеиспускание</LI>
            <LI>2. Боли в пояснице</LI>
            <LI>3. Выделения из мочеиспускательного канала</LI>
          </ol>
        </div></a><a class="questions-list__item item-two" href="zabolevania-mans.html"><span class="questions-list__title">Заболевания у мужчин</span>
        <div class="img-text"><img class="img-text__img no-hover" src="img/top-man.png" alt="" role="presentation"/><img class="img-text__img hover-image hide" src="img/top-man-hover.png" alt="" role="presentation"/>
          <ol class="img-text__list">
            <LI>1. Рези при мочеиспускании</LI>
            <LI>2. Выделения из мочеиспускательного канала</LI>
            <LI>3. Боли в половом члене и яичках</LI>
          </ol>
        </div></a><a class="questions-list__item item-three" href="zabolevania-pochek.html"><span class="questions-list__title">Болезни почек</span>
        <div class="img-text"><img class="img-text__img no-hover" src="img/top-three.png" alt="" role="presentation"/><img class="img-text__img hover-image hide" src="img/top-three-hover.png" alt="" role="presentation"/>
          <ol class="img-text__list">
            <LI>1. Острый и хронический пиелонефрит</LI>
            <LI>2. Мочекаменная болезнь</LI>
            <LI>3. Кисты почек и другие новообразования</LI>
          </ol>
        </div></a><a class="questions-list__item item-four" href="zabolevania-pochek.html"><span class="questions-list__title">Вопросы</span>
        <div class="img-text"><img class="img-text__img no-hover" src="img/quest.png" alt="" role="presentation"/><img class="img-text__img hover-image hide" src="img/quest-hover.png" alt="" role="presentation"/>
          <ol class="img-text__list">
            <LI>Добрый день мужу нужно сделать срочно обрезание. Диагноз поставленный врачом - фимоз. Но проблема в том что очень мало времени, а там.</LI>
          </ol>
        </div></a>
      </div>
      <div class="main-info">
        <div class="main-info__left-part">
          <div class="erorr-404"><img class="erorr-404__image-404" src="img/404-page.png" alt="" role="presentation"/>
          </div>
        </div>
        <div class="main-info__middle-part">
          <div class="error-text">
            <p class="error-text__text"> Запрашиваемая вами страница еще не создана либо находится в разработке.
            </p>
            <p class="error-text__text"> Если вы не нашли ответа на интересующий вас вопрос, можете задать его здесь, воспользуясь формой.
            </p><a class="error-text__text link" href="{{ url('/') }}"> Вернуться на главную</a>
          </div>
        </div>
        <div class="main-info__right-part">
          
          @include('layouts.question-form')

        </div>
      </div>
    </div>
    
    {{-- @include('layouts.sidebar') --}}

  </div>
</section>
@endsection