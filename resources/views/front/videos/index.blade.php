@extends('front.template.page')
@section('classes_body', 'js-home-page')

@section('title', 'Sal De Riso Press Area')

@php($videos = App\Models\Video::where('visible',1)->get())

@section('wrapper')

    <header-slide></header-slide>
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-12">
                <h1 class="text-center">Video</h1>
                <p class="text-center">Una selezione di video dal nostro archivio.</p>
            </div>
        </div>
        <div class="row">
            @foreach($videos as $video)

                <div class="col-md-6 pb-4"><app-video :vid="{{$video}}"></app-video></div>

            @endforeach
        </div>
    </div>
    <app-footer></app-footer>
@endsection
