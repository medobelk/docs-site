@extends('layouts.master')

@section('content')
	<section class="zabolevania-pochek">
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
	                    <div class="question"><a class="question__name" href="{{ url('/Pagec/view/name/pielonefrit') }}">Пиелонефрит</a>
	                      <p class="question__text">В случаях, когда заболевание развивается в совершенно здоровой ничем не скомпрометированной почке, пиелонефрит называют первичным. Хронический пиелонефрит чаще всего бывает вторичным. При обострении хронического пиелонефрита проявления могут быть невыраженными, скрытыми настолько, что больной не обращает внимания. Одним из основных критериев для постановки диагноза являются лабораторные методы исследования. Если вы подозреваете у себя наличие пиелонефрита, не занимайтесь самолечением во избежание усугубления ситуации, обратитесь к специалисту.
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
	                  <h4 class="zabs-body__title"> Болезни почек
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