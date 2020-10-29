@extends('adminlte::page')

@section ('title_prefix', __('titles.'.$title) .' -')

@section('content')
    <div class="row">
        <div class="card card-mini">
            <div class="card-header">
                <h1 class="m0 text-dark card-title text-xl">
                    {{$item->name}}
                </h1>
                <div class="card-action">
                    <a href="{{ route('videos.edit',$item->id_code) }}">
                        <i class="fas fa-pencil-alt fa-3x fa-fw" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('videos.index') }}">
                        <i class="fas fa-arrow-circle-left fa-3x fa-fw" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-md-12 col-sm-12">
                        @php
                            $url_components = parse_url($item->url);
                            $host = $url_components['host'];
                            $id=substr($url_components['path'],1)


                        @endphp



                        @if (str_contains($host,'youtu'))

                            <iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/{{$id}}" allowfullscreen class="youtube-video">
                            </iframe>
                        @else
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/{{$id}}"
                                        frameborder='0' webkitAllowFullScreen mozallowfullscreen
                                        allowFullScreen></iframe>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="section">
                            <div class="section-title"><h3>Information</h3></div>
                            <div class="section-body">
                                <label class="control-label">ID:</label> {{ $item->id }}
                            </div>
                            <div class="section-body">
                                <label class="control-label">Url:</label> {{ $item->url}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="section">
                            <div class="section-title"><h3>Extra</h3></div>
                            <div class="section-body">
                                <label class="control-label">Visible:</label> {{ $item->visible ? "Yes" : "No"}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 col-sm-12">
                        <div class="section">
                            <div class="section-title"><h3>Description</h3></div>
                            <div class="section-body">
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


@endsection

