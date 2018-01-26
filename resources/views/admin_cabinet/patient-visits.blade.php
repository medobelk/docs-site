@extends('admin_cabinet.master')

@section('content')
  <section class="section content-section">
      <div class="container">
        <div class="block" >
          <div class="columns" style="justify-content: center;">
            <div class="column is-2"></div>
            <div class="column is-4">
              <div class="user-block">
                <div class="info-block">
                  <p class="info-block-title">Ф.И.О.</p>
                  <p class="is-italic has-text-weight-bold">{{ $user->name }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Электронный Адрес</p>
                  <p class="is-italic">{{ $user->email }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Номер</p>
                  <p class="is-italic">{{ $user->phone }}</p>
                </div>
                <div class="info-block">
                  <p class="info-block-title">Дата Рождения</p>
                  <p class="is-italic has-text-weight-bold">{{ $user->birth_date }}</p>
                </div>
                <div class="is-clearfix rd-links has-text-centered">
                  <a href="{{ url("/admin/visit/$user->id") }}" class="is-pulled-left">Записать</a>  
                  <a href="{{ url("/admin/patient-edit/$user->id") }}" class="is-pulled-right">Редактировать</a>  
                </div>
              </div>
              <div class="visits">
                <h4 class="has-text-centered is-size-3 ">Визиты</h4>
                  @foreach( $visits as $visit )
                    <div class="visite">
                      <div class="visit-info-block">
                        <p class="is-italic has-text-weight-bold info-block-title">Дата Визита</p>
                        <p>{{ $visit->visit_date }}</p>
                      </div>
                      <div class="visit-info-block">
                        <p class="info-block-title has-text-weight-semibold">Жалобы</p>
                        <p>{{ $visit->complaints }}</p>
                      </div>
                      <div class="visit-info-block">
                        <p class="info-block-title has-text-weight-semibold">Диагноз</p>
                        <p>{{ $visit->diagnosis }}</p>
                      </div>
                      <div class="visit-info-block">
                        <p class="info-block-title has-text-weight-semibold">Жалобы</p>
                        <p>{{ $visit->treatment }}</p>
                      </div>
                      <div class="visit-info-block">
                        <p class="info-block-title has-text-weight-semibold">Жалобы</p>
                        <p>{{ $visit->recomendations }}</p>
                      </div>
                      <div class="is-clearfix rd-links">
                        <a href="{{ url("/admin/visit-edit/$visit->id") }}" class="is-pulled-left">Редактировать</a>  
                        <form action="{{ url("/admin/visit/$visit->id") }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <input value="Удалить" type="submit" class="delete-link is-pulled-right" />
                        </form>
                      </div>
                    </div>
                  @endforeach
              </div>
            </div>

            @include('admin_cabinet.patients-sidebar')

          </div>
        </div>
        <!-- <div class="sidebar"></div> -->
      </div>
    </section>
@endsection
