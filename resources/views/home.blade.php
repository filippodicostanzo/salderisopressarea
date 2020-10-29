@extends('adminlte::page')

@section('title', 'Sal De Riso Press Area')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')


    <div class="row">
        <!-- numTown -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-yellow-light" href="{{ url('/admin/documents') }}">
                <div class="card-body">
                    <i class="icon fa fa-file fa-4x"></i>
                    <div class="content">
                        <div class="title">{{ __('titles.documents') }}</div>
                        <div class="value">{{$counter['documents']}}</div>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-orange-light" href="{{ url('/admin/logos') }}">
                <div class="card-body">
                    <i class="icon fa fa-spinner fa-4x"></i>
                    <div class="content">
                        <div class="title">{{ __('titles.logos') }}</div>
                        <div class="value">{{$counter['logos']}}</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-blue-light" href="{{ url('/admin/galleries') }}">
                <div class="card-body">
                    <i class="icon fa fa-images fa-4x"></i>
                    <div class="content">
                        <div class="title">{{ __('titles.galleries') }}</div>
                        <div class="value">{{$counter['galleries']}}</div>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-green-light" href="{{ url('/admin/videos') }}">
                <div class="card-body">
                    <i class="icon fa fa-video fa-4x"></i>
                    <div class="content">
                        <div class="title">{{ __('titles.videos') }}</div>
                        <div class="value">{{$counter['videos']}}</div>
                    </div>
                </div>
            </a>
        </div>

    </div>

@stop
