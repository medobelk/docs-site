@extends('voyager::master')

@section('page_title', __('voyager.generic.view').' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager.generic.viewing') }} {{ ucfirst($dataType->display_name_singular) }} &nbsp;

        @can('edit', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp;
            {{ __('voyager.generic.edit') }}
        </a>
        @endcan
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager.generic.return_to_list') }}
        </a>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <!-- form start -->
                    @foreach($dataType->readRows as $row)
                        @php $rowDetails = json_decode($row->details);
                         if($rowDetails === null){
                                $rowDetails=new stdClass();
                                $rowDetails->options=new stdClass();
                         }
                        @endphp

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">{{ $row->display_name }}</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            @if($row->type == "image")
                                <img class="img-responsive"
                                     src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                            @elseif($row->type == 'multiple_images')
                                @if(json_decode($dataTypeContent->{$row->field}))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                        <img class="img-responsive"
                                             src="{{ filter_var($file, FILTER_VALIDATE_URL) ? $file : Voyager::image($file) }}">
                                    @endforeach
                                @else
                                    <img class="img-responsive"
                                         src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                                @endif
                            @elseif($row->type == 'relationship')
                                 @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                            @elseif($row->type == 'select_dropdown' && property_exists($rowDetails, 'options') &&
                                    !empty($rowDetails->options->{$dataTypeContent->{$row->field}})
                            )

                                <?php echo $rowDetails->options->{$dataTypeContent->{$row->field}};?>
                            @elseif($row->type == 'select_dropdown' && $dataTypeContent->{$row->field . '_page_slug'})
                                <a href="{{ $dataTypeContent->{$row->field . '_page_slug'} }}">{{ $dataTypeContent->{$row->field}  }}</a>
                            @elseif($row->type == 'select_multiple')
                                @if(property_exists($rowDetails, 'relationship'))

                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                        @if($item->{$row->field . '_page_slug'})
                                        <a href="{{ $item->{$row->field . '_page_slug'} }}">{{ $item->{$row->field}  }}</a>@if(!$loop->last), @endif
                                        @else
                                        {{ $item->{$row->field}  }}
                                        @endif
                                    @endforeach

                                @elseif(property_exists($rowDetails, 'options'))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                     {{ $rowDetails->options->{$item} . (!$loop->last ? ', ' : '') }}
                                    @endforeach
                                @endif
                            @elseif($row->type == 'date')
                                {{ $rowDetails && property_exists($rowDetails, 'format') ? \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($rowDetails->format) : $dataTypeContent->{$row->field} }}
                            @elseif($row->type == 'checkbox')
                                @if($rowDetails && property_exists($rowDetails, 'on') && property_exists($rowDetails, 'off'))
                                    @if($dataTypeContent->{$row->field})
                                    <span class="label label-info">{{ $rowDetails->on }}</span>
                                    @else
                                    <span class="label label-primary">{{ $rowDetails->off }}</span>
                                    @endif
                                @else
                                {{ $dataTypeContent->{$row->field} }}
                                @endif
                            @elseif($row->type == 'color')
                                <span class="badge badge-lg" style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                            @elseif($row->type == 'coordinates')
                                @include('voyager::partials.coordinates')
                            @elseif($row->type == 'rich_text_box')
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p>{!! $dataTypeContent->{$row->field} !!}</p>
                            @elseif($row->type == 'file')
                                @if(json_decode($dataTypeContent->{$row->field}))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                        <a href="/storage/{{ $file->download_link or '' }}">
                                            {{ $file->original_name or '' }}
                                        </a>
                                        <br/>
                                    @endforeach
                                @else
                                    <a href="/storage/{{ $dataTypeContent->{$row->field} }}">
                                        Download
                                    </a>
                                @endif
                            @else
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p>{{ $dataTypeContent->{$row->field} }}</p>
                            @endif

                        </div><!-- panel-body -->

                        @if(!$loop->last)
                            <hr style="margin:0;">
                        @endif
                    @endforeach
                    <div id="accordion" role="tablist">
                        @if( isset($visits) )
                        @foreach( $visits as $key => $visit )
                            <div class="card">
                                <a data-toggle="collapse" href="#collapse{{ $visit->id }}" aria-expanded="false" aria-controls="collapse{{ $visit->id }}">
                                    <div class="card-header" role="tab" style="background-color: #AEE4FF;" id="heading{{ $visit->id }}">
                                        <h5 class="mb-0 panel-title">
                                              Visit : {{ $visit->visit_date }}
                                              <span class="icon voyager-double-down"></span>
                                        </h5>
                                    </div>
                                </a>
                                <div id="collapse{{ $visit->id }}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Дата Визита</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>{{ $visit->visit_date }}</p>
                                        </div>
                                        
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Жалобы</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>{{ $visit->complaints }}</p>
                                        </div>

                                        <div class="panel-heading">
                                            <h3 class="panel-title">Kурс Лечения</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>{{ $visit->treatment }}</p>
                                        </div>

                                        <div class="panel-heading">
                                            <h3 class="panel-title">Рекомендации</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>{{ $visit->recomendations }}</p>
                                        </div>

                                        <div class="panel-heading">
                                            <h3 class="panel-title">Диагноз</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>{{ $visit->diagnosis }}</p>
                                        </div>
                                        
                                        <div class="panel-body">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Анализы</h3>
                                            </div>
                                            @include('voyager_custom.analyzes-partial')
                                        </div>
                                        <div>
                                            <a class="btn btn-info" href="{{ 'http://doctor-site.dev/admin/visits/'.$visit->id.'/edit' }}">
                                                <span>Редактировать Посещение</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            $("h3:contains('name')").text('Имя');
            $("h3:contains('password')").text('Пароль');
            $("h3:contains('email')").text('Почта');
            $("h3:contains('phone')").text('Номер');
            $("h3:contains('Birth Date')").text('Дата Рождения');
            $("h3:contains('Visit Date')").text('Дата Визита');
            $("h3:contains('Control Visit')").text('Котрольный Визит');
            $("h3:contains('created_at')").text('Дата Создания');
        });
    </script>
    @if ($isModelTranslatable)
    <script>
        $(document).ready(function () {
            $('.side-body').multilingual();
        });
    </script>
    <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
@stop
