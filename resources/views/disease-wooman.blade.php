@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection


@section('content')
  <section class="zabolevania-womans">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">
          <div class="main-info__left-part">
            <div class="zabs-list">
              <div class="zabs-list__zabs">
                <div class="zabs-body">
                  <h4 class="zabs-body__title"> Распространенные проблемы
                  </h4>
                  <div class="last-questions">
                    <div class="question"><a class="question__name" href="{{ url('/Pagec/view/name/zistit') }}">Цистит</a>
                      <p class="question__text">Если лечение не соответствует тяжести или микроорганизм устойчив к терапии, воспаление распространяется на почки. Что значительно хуже. Осложнение цистита воспалением почек может протекать бессимптомно, но чаще об осложнении говорит повышение температуры тела, появление боли в пояснице. Каким методом лечить цистит, в конкретном случае должен решать врач вместе с больным. Учитывается длительность заболевания, анализы, возбудитель заболевания, сопутствующие факторы.
                      </p>
                    </div>
                    <div class="question"><a class="question__name" href="{{ url('/Pagec/view/name/uretrit') }}">Уретрит</a>
                      <p class="question__text">Терапевтическая тактика зависит от причин, характера течения, усточивости бактерий, состояния иммунитета больного. Это заболевание вызывается целым рядом причин. Основным проявлением которого является рези, жжение, боль, при мочеиспускании. Уретрит может проявляться выделениями, однако, этот признак присутствует не всегда.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main-info__middle-part">
            <div class="zabs-list">
              <div class="zabs-list__zabs">
                <div class="zabs-body">
                  <h4 class="zabs-body__title"> Заболевания у женщин
                  </h4>
                  <ol>
                    <DIV class="list-item">
                      <SPAN>1</SPAN>
                      <LI>Острый и хронический цистит</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>2</SPAN>
                      <LI>Уретрит</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>3</SPAN>
                      <LI>Кандиломы, папиломы мочеиспускательного канала</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>4</SPAN>
                      <LI>Сужение мочеиспускательного канала</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>5</SPAN>
                      <LI>Недержание мочи</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>6</SPAN>
                      <LI>Нейрогенный мочевой пузырь</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>7</SPAN>
                      <LI>Другие заболевания почек и мочевого пузыря</LI>
                    </DIV>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="main-info__right-part">

            @include('layouts.enroll-form')

          </div>
        </div>
      </div>
      
      @include('layouts.sidebar')

    </div>
  </section>
@endsection