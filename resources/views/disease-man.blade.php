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
                          <p class="question__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
                        <div class="question"><a class="question__name" href="#">Эректильная дисфункция</a>
                          <p class="question__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
                          </p>
                        </div>
                        <div class="question"><a class="question__name" href="#">Простатит</a>
                          <p class="question__text">У меня все признаки пиелонефрита,периодически выходит кишечная палочка,сдавала бак посев 10 в 6 ,чем уже не лечилась и антибиотиками и травами, бадами ничего не помогает.подскажите как можно к вам попасть на прием,у меня как раз сейчас стадия обострения.частое мочеиспускание,жжение.Заранее спасибо.
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