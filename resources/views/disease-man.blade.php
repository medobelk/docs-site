@extends('layouts.master')

@section('content')
	<section class="zabolevania-mans">
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
                        <div class="question"><a class="question__name" href="#">Простатит</a>
                          <p class="question__text">Для успешного лечения простатита необходимо выявить те факторы и причины которые привели к заболеванию в данном конкретном случае, у конкретного пациента. Для этого и делаем целый ряд лабораторных исследований, пальцевое ректальное исследование и ультразвуковое сканирование
                            простаты.
                          </p>
                        </div>
                        <div class="question"><a class="question__name" href="#">Эректильная дисфункция</a>
                          <p class="question__text">Выявляю причину нарушения, только затем определяю тактику терапевтических мероприятий. Терапия включает воздействие на системы организма, принимающие участие в механизме эрекции. Использую медикаментозную терапию, препараты нейротропного характера и препараты, улучшающие обмен веществ. При нарушении гормонального статуса назначаются необходимые средства.
                          </p>
                        </div>
                        <div class="question"><a class="question__name" href="#">Простатит</a>
                          <p class="question__text">В зависимости от каждого конкретного случая провожу  минимальную, частичную ,свободную  и умереную циркумцизии. Кроме того у меня возможно проведение пластики крайней плоти. Использую современные методы обезболивания. поэтому пациент испытывает только легкую боль в момент первого укола в виде укуса комара. Применение радиоволнового скальпеля позволяет провести вмешательство бескровно и безболезненно.
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
                      <h4 class="zabs-body__title"> Заболевания у мужчин
                      </h4>
                      <ol>
                        <DIV class="list-item">
                          <SPAN>1</SPAN>
                          <LI>Баланит</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>2</SPAN>
                          <LI>Эпидидимит</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>3</SPAN>
                          <LI>Орхит</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>4</SPAN>
                          <LI>Гидроцеле</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>5</SPAN>
                          <LI>Киста яичка и других половых органов</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>6</SPAN>
                          <LI>Варикоцеле</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>7</SPAN>
                          <LI>Различные опухоли мужских половых органов</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>8</SPAN>
                          <LI>Доброкачественная гиперплазия предстательной железы</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>9</SPAN>
                          <LI>Кандиломатоз и паппилломатоз половых органов и органов мочевыделения</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>10</SPAN>
                          <LI>
                            Мужское бесплодие.Гипопластическая индурация полового члена или болезнь Пейрони</LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>11</SPAN>
                          <LI>
                            Склероатрофический лихен или лейкоплакияСтриктура ( сужение мочеиспукательного канала)
                            Недержание мочи
                            Фимоз
                          </LI>
                        </DIV>
                        <DIV class="list-item">
                          <SPAN>12</SPAN>
                          <LI>Травмы мочеиспускательного канала и мочевого пузыря</LI>
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