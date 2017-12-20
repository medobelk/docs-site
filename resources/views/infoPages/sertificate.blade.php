@extends('layouts.master')

@section('content')
	<section class="diseases">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')
            
            <div class="main-info">
              <div class="main-info__left-part single-part">
                <div class="methods-list serf-list">
                  <div class="methods-list__methods">
                    <div class="methods-body">
                      <div class="method">
                      	<h4 class="method__title serf_title-main serf-titul">Свидетельство про аттестацию в 2015 году </h4>
                      	<div class="single-sertificate">
                      		<span class='zoom' id='ex1'> 
                      			<img class="sertificate-image" id='jack' src="{{ asset('img/sertificate.png') }}" alt="" role="presentation"/>
                      		</span>
	                      	
	                      	<div class="serf-info">
	                      		<p class="serf-info__title">Свидетельство № 1397</p>
	                      		<p class="serf-info__text">15 июля 2015г присвоена высшая категория по специальности «урология». </p>
	                      	</div>
                      	</div>

                          <div id="picview" class="picview">
                              <img src="{{ asset('img/sertificate.png') }}" name="viewArea" id="viewArea" draggable="false">
                          </div>
                      </div>
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
