@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns">
        <div class="column is-1"></div>
        <div class="column is-6">
          @foreach( $reviews as $review )
            <div class="info-block">
              <p class="info-block-title has-text-weight-semibold">
                <a class="patient-link" style="" >
                  @if( $review->authority !== 'ANONIM' )
                    {{ $review->user['name'] }}
                  @else
                    Аноним
                  @endif
                </a>
                {{ date('d.m.Y', strtotime($review->created_at) ) }}
              </p>
              <p>{{ $review->body }}</p>
              <div class="rd-links is-clearfix has-text-centered">

                @if( $review->status === 'PENDING' )

                  <form class="is-pulled-left" action="{{ url("/admin/review/$review->id") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input class="input-as-link" type="submit" value="Опубликовать" />
                  </form>

                @else

                  <form class="is-pulled-left" action="{{ url("/admin/review/$review->id") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input class="input-as-link" type="submit" value="Отменить" />
                  </form>

                @endif  

                  <a class="" href='{{ url("/admin/review-edit/$review->id") }}'>Редактировать</a>

                  <form class="is-pulled-right has-text-right" action="{{ url("/admin/review/$review->id") }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input class="input-as-link" type="submit" value="Удалить" />
                  </form>
              </div>
            </div>
          @endforeach
        </div>

        @include('admin_cabinet.patients-sidebar')

      </div>
    </div>
    <!-- <div class="sidebar"></div> -->
  </div>
</section>
@endsection
