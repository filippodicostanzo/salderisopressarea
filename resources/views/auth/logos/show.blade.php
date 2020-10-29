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
                    <a href="{{ route('logos.edit',$item->id_code) }}">
                        <i class="fas fa-pencil-alt fa-3x fa-fw" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('logos.index') }}">
                        <i class="fas fa-arrow-circle-left fa-3x fa-fw" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-md-12 col-sm-12">
                        <img src="{{$item->image}}">
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="section">
                            <div class="section-title"><h3>Information</h3></div>
                            <div class="section-body">
                                <label class="control-label">ID:</label> {{ $item->id }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="section">
                            <div class="section-title"><h3>Extra</h3></div>
                            <div class="section-body">
                                <label class="control-label">Visible:</label>  {{ $item->visible ? "Yes" : "No"}}
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

@push('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.4/pdfobject.min.js"></script>
    <script>PDFObject.embed("{{$item->file}}", "#file");</script>
@endpush


