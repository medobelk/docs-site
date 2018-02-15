@extends('admin_cabinet.master')

@section('content')
  <section class="section">
      <div class="container">
        <div class="block" >
          <div class="columns" style="justify-content: center;">
            <div class="column is-2"></div>
            <div class="column is-4">
              @foreach( $users as $user )
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
                  <p class="is-italic has-text-weight-bold">{{ date( 'Y-m-d', strtotime($user->birth_date)) }}</p>
                </div>
                <div class="rd-links is-flex">
                  <a href='{{ url("/admin/visit/$user->id") }}' class="">Записать</a>  
                  <a href='{{ url("/admin/patient/$user->id") }}' class="">Визиты</a>  
                  <a href='{{ url("/admin/patient-edit/$user->id") }}' class="">Редактировать</a>  
                  <form action="{{ url("/admin/patient/$user->id") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="input-as-link" value="Удалить" />
                  </form>
                </div>
              </div>
              @endforeach
              <!-- <div class="visits">
                <h4 class="has-text-centered is-size-3 ">Визиты</h4>
                <div class="visite">
                  <div class="visit-info-block">
                    <p class="is-italic has-text-weight-bold info-block-title">Дата Визита</p>
                    <p>12.12.12</p>
                  </div>
                  <div class="visit-info-block">
                    <p class="info-block-title has-text-weight-semibold">Жалобы</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed fuga consequatur eveniet suscipit explicabo unde debitis. Amet accusamus, quod incidunt doloremque aspernatur laborum aut magni harum odit optio enim explicabo quibusdam repellendus in, unde voluptatum dolor assumenda impedit voluptatem quis non rerum similique sed minus. Nisi ex dolorum et natus temporibus eos velit accusantium eveniet, ea voluptas nesciunt, exercitationem nam, aliquid quod earum reiciendis quasi sequi incidunt odio totam. Vel praesentium consequuntur aut quo facilis, laborum magnam soluta. Unde molestias officia excepturi ipsa incidunt magni necessitatibus, enim, mollitia quos voluptatum autem iure, eveniet dolor ut eligendi hic repellendus. Rem nemo eum provident sunt odit consequatur at repudiandae, est ex ab aut, molestias fugit quod dicta molestiae assumenda fuga. Ullam, iste.</p>
                  </div>
                  <div class="visit-info-block">
                    <p class="info-block-title has-text-weight-semibold">Диагноз</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed fuga consequatur eveniet suscipit explicabo unde debitis. Amet accusamus, quod incidunt doloremque aspernatur laborum aut magni harum odit optio enim explicabo quibusdam repellendus in, unde voluptatum dolor assumenda impedit voluptatem quis non rerum similique sed minus. Nisi ex dolorum et natus temporibus eos velit accusantium eveniet, ea voluptas nesciunt, exercitationem nam, aliquid quod earum reiciendis quasi sequi incidunt odio totam. Vel praesentium consequuntur aut quo facilis, laborum magnam soluta. Unde molestias officia excepturi ipsa incidunt magni necessitatibus, enim, mollitia quos voluptatum autem iure, eveniet dolor ut eligendi hic repellendus. Rem nemo eum provident sunt odit consequatur at repudiandae, est ex ab aut, molestias fugit quod dicta molestiae assumenda fuga. Ullam, iste.</p>
                  </div>
                  <div class="is-clearfix rd-links">
                    <a href="" class="is-pulled-left">Редактировать</a>  
                    <a href="" class="is-pulled-right">Удалить</a>
                  </div>
                </div>
              </div> -->
            </div>

            @include('admin_cabinet.patients-sidebar')

          </div>
        </div>
        <!-- <div class="sidebar"></div> -->
      </div>
    </section>
@endsection
