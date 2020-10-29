@extends('front.template.page')
@section('classes_body', 'js-home-page')

@section('title', 'Sal De Riso Press Area')

@php($logos = App\Models\Logo::where('visible',1)->get())

@section('wrapper')

    <header-slide></header-slide>
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-12">
                <h1 class="text-center">Loghi & Brand</h1>
                <p class="text-center">Loghi aziendali in formato jpeg, pdf e vettoriale.</p>
            </div>
        </div>
        <div class="row">
            @foreach($logos as $logo)

                <div class="col-md-3 pb-4"><app-logo :logo="{{$logo}}"></app-logo></div>

            @endforeach
        </div>
    </div>
    <app-footer></app-footer>
@endsection
