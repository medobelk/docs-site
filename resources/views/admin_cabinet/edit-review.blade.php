@extends('admin_cabinet.master')

@section('content')
<section class="section content-section">
  <div class="container">
    <div class="block" >
      <div class="columns" style="justify-content: center;">
        <div class="column is-2"></div>
        <div class="column is-4">
          <form class="main-content__adding-form" method="POST" action="{{ url("/admin/review/$review->id") }}  ">
            {{ csrf_field() }}

            <div class="info-block">
              <p class="info-block-title"><a style="font-weight: bold; color: #58647c;">@if($review->authority === 'ANONIM')Аноним@else{{$review->user['name']}}@endif</a> {{$review->created_at}}</p>
            </div>
            <div class="info-block">
              <p class="info-block-title">Содержание</p>
              <textarea class="area-field" name="body">@if( old('body') !== null ){{ old('body') }}@else{{ $review->body }}@endif</textarea>
            </div>

            <input class="submit-button has-text-weight-semibold is-uppercase is-size-5" type="submit" value="обновить"/>

          </form>
        </div>


        @include('admin_cabinet.patients-sidebar')

      </div>
    </div>
    
  </div>
</section>
@endsection
