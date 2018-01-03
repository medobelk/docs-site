<div id="accordion" role="tablist">

@foreach($analyzes as $analyze)
  <!-- <a href="{{ url('storage/'.json_decode($analyze->path)[0]->download_link) }}" download="{{ json_decode($analyze->path)[0]->original_name }}" style="margin-right: 15px;"><span class="icon voyager-file-text" style="padding-right: 5px; "></span>{{ json_decode($analyze->path)[0]->original_name }}</a> -->
  <div class="card">
    <a data-toggle="collapse" href="#analyze-collapse{{ $analyze->id }}" aria-expanded="false" aria-controls="analyze-collapse{{ $analyze->id }}">
      <div class="card-header" role="tab" style="background-color: #AEE4FF;" id="heading{{ $analyze->id }}">
        <h5 class="mb-0 panel-title">
          {{ $analyze->name }}
          <span class="icon voyager-double-down"></span>
        </h5>
      </div>
    </a>

    <div id="analyze-collapse{{ $analyze->id }}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

        <div class="panel-heading">
          <h3 class="panel-title">{{ $analyze->name }}</h3>
        </div>
        <form class="form-edit-add" action="{{ url('admin-cus/analyze-edit-add/'.$analyze->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
          {{ csrf_field() }}
          <p>
            <a href="{{ url('storage/'.json_decode($analyze->path)[0]->download_link) }}" download="{{ $analyze->name }}" style="margin-right: 15px;"><span class="icon voyager-file-text" style="padding-right: 5px; "></span>{{ $analyze->name }}</a>
          </p>
          <label for="analyze_name">Новое Название</label>
          <input class="form-control" type="text" name="analyze_name" placeholder="Новехонькое">
          <label for="file">Новый Файл</label>
          <input type="file" name="file">
          <input type="hidden" name="id" value="{{ $analyze->id }}">
          <input type="hidden" value="{{ $analyze->visit->id }}" name="visit">
          <input type="hidden" value="{{ $analyze->visit->user->id }}" name="user">
          <input class="btn btn-primary save" type="submit" name="" title="Не более одного изменения за раз" value="Обновить">
        </form>
        <form action="{{ url('admin-cus/analyze-delete/'.$analyze->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input class="btn btn-danger" type="submit" name="" title="Навсегда" value="Удалить">
        </form>

      </div>
    </div>
  </div>
  <?php $visit = $analyze->visit ?>
@endforeach
  <div class="card">
    <a data-toggle="collapse" href="#new-analyze-{{$visit->id}}" aria-expanded="false" aria-controls="new-analyze-{{$visit->id}}">
      <div class="card-header" role="tab" style="background-color: #90f0c5;" id="heading-new-analyze">
        <h5 class="mb-0 panel-title">
          Добавить Новый Анализ
          <span class="icon voyager-double-down"></span>
        </h5>
      </div>
    </a>

    <div id="new-analyze-{{$visit->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

        <div class="panel-heading">
          <h3 class="panel-title">Добавить</h3>
        </div>
        <form class="form-edit-add" action="{{ url('admin-cus/analyze-edit-add/new') }}" method="POST" class="form-group" enctype="multipart/form-data">
          {{ csrf_field() }}
          <label for="analyze_name">Название</label>
          <input class="form-control" type="text" name="analyze_name" placeholder="Новенький">
          <label for="file">Путь</label>
          <input type="file" name="file" >
          <input type="hidden" value="{{ $visit->id }}" name="visit">
          <input type="hidden" value="{{ $visit->user->id }}" name="user">          
          <input class="btn btn-success btn-add-new" type="submit" name="" title="Не более одного изменения за раз" value="Добавить">
        </form>

      </div>
    </div>
  </div>
</div>