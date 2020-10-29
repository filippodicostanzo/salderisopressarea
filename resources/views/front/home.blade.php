@extends('front.template.page')
@section('classes_body', 'js-home-page')

@section('title', 'Sal De Riso Press Area')

@section('wrapper')
    <header-slide></header-slide>
    <div class="container mt-100 pb-100" id="main">
        <div class="row pb-30">
            <div class="offset-md-2 col-md-4 col-lg-4"><card-home id="documents" title="Documenti" desc="Comunicati stampa, rassegna stampa e news"></card-home></div>
            <div class="col-md-4 col-lg-4"><card-home id="logos" title="Loghi" desc="Loghi aziendali in formato jpeg, pdf e vettoriale"></card-home></div>
        </div>
        <div class="row">
            <div class="offset-md-2 col-md-4 col-lg-4"><card-home id="galleries" title="Photo" desc="Archivio fotografico anche in alta risoluzione"></card-home></div>
            <div class="col-md-4 col-lg-4"><card-home id="videos" title="Video" desc="Una selezione di video dal nostro archivio"></card-home></div>
        </div>

    </div>
    <app-footer></app-footer>
@endsection
