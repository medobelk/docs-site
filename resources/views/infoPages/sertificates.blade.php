@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
  <section class="about-page">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">

          <div class="main-info__middle-part all-serfs">
            <div class="serfs-list">
              <div class="serfs-list__serfs">
                <div class="serfs-body">
                  <h4 class="serfs-body__title">Сертификаты, удостоверения
                  </h4>
                  <div class="serfs-list">
                    <h4 class="serfs-list__title">Атестации, лицензия
                    </h4>
                    <div class="serfs">
                      <ol>
                        @foreach($licenses as $key => $license)
                        <a href="{{ url('/Pagec/view/name/sertificate/'.$license->id) }}">
                          <span>{{ ++$key }} </span>
                          <li>{{ $license->name }}</li>
                        </a>
                        @endforeach
                      </ol>
                    </div>
                  </div>
                  <div class="serfs-list">
                    <h4 class="serfs-list__title">Конференции
                    </h4>
                    <div class="serfs">
                      <ol>
                        @foreach($conferences as $key => $conference)
                        <a href="{{ url('/Pagec/view/name/sertificate/'.$conference->id) }}">
                          <span>{{ ++$key }} </span>
                          <li> 
                            <li>{{ $conference->name }}</li>
                          </li>
                        </a>
                        @endforeach
                      </ol>
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