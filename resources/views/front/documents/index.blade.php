@extends('front.template.page')
@section('classes_body', 'js-home-page')

@section('title', 'Sal De Riso Press Area')

@php($documents = App\Models\Document::where('visible',1)->get())

@section('wrapper')

    <header-slide></header-slide>
   <div class="container">
       <div class="row pt-5 pb-5">
           <div class="col-12">
               <h1 class="text-center">Documenti</h1>
               <p class="text-center">Comunicati stampa, rassegna stampa e news.</p>
           </div>
       </div>
        <div class="row">
            @foreach($documents as $document)

                <div class="col-md-3 pb-4"><app-document :doc="{{$document}}"></app-document></div>

            @endforeach
        </div>
   </div>
    <app-footer></app-footer>
@endsection
