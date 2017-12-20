@extends('layouts.master')

@section('content')
  <section class="zabolevania-all">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">
          <div class="main-info__left-part">
            <div class="zabs-list">
              <div class="zabs-list__zabs">
                <div class="zabs">
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
                        <LI><a href="">Орхит</a></LI>
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
                        <LI><a href="">Варикоцеле</a></LI>
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
                          <a href="">Фимоз</a>
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
          </div>
          <div class="main-info__middle-part">
            <div class="zabs-list">
              <div class="zabs-list__zabs">
                <div class="zabs">
                  <div class="zabs-body">
                    <h4 class="zabs-body__title"> Заболевания у Женщин
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
                        <LI>
                          Нейрогенный мочевой пузырьДругие заболевания почек и мочевого пузыря</LI>
                      </DIV>
                    </ol>
                  </div>
                </div>
                <div class="zabs-body">
                  <h4 class="zabs-body__title"> Заболевания почек
                  </h4>
                  <ol>
                    <DIV class="list-item">
                      <SPAN>1</SPAN>
                      <LI>Острый и хронический пиелонефрит</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>2</SPAN>
                      <LI>Мочекаменная болезнь</LI>
                    </DIV>
                    <DIV class="list-item">
                      <SPAN>3</SPAN>
                      <LI>Кисты почек и другие новообразования</LI>
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