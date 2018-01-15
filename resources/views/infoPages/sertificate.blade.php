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
                      	<h4 class="method__title serf_title-main serf-titul" style="padding-right: 75px;">{{ $sertificate->name }}</h4>
                      	<div class="single-sertificate">
                      		<span class='zoom' id='ex1'> 
                            <img id="zoom_02" class="sertificate-image" 
                                  src="{{ asset('img'.$sertificate->path) }}" 
                                  data-zoom-image="{{ asset('img'.$sertificate->path_big) }}"/>
                      		</span>
	                      	
	                      	<div class="serf-info">
	                      		<p class="serf-info__title">{{ $sertificate->title }}</p>
	                      		<p class="serf-info__text">{{ $sertificate->description }}</p>
	                      	</div>
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
