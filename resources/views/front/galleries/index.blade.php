@extends('front.template.page')
@section('classes_body', 'js-home-page')

@section('title', 'Sal De Riso Press Area')

@php($galleries = App\Models\Gallery::where('visible',1)->get())

@section('wrapper')

    <header-slide></header-slide>
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-12">
                <h1 class="text-center">Photo</h1>
                <p class="text-center">Archivio fotografico anche in alta risoluzione.</p>
            </div>
        </div>
        <div class="row">
            @foreach($galleries as $gallery)

                <div class="col-md-4 pb-4"><app-gallery :gallery="{{$gallery}}"></app-gallery></div>


            @endforeach
        </div>
    </div>
    <app-footer></app-footer>
@endsection
