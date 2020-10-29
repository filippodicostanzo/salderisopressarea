@extends('front.template.page')
@section('classes_body', 'js-home-page')

@section('title', 'Sal De Riso Press Area')

@section('wrapper')

    <header-slide> </header-slide>
    <div class="container">
        <tab-gallery gallery="{{$gallery}}"></tab-gallery>
    </div>
    <app-footer></app-footer>
@endsection
