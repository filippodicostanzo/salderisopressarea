@extends('adminlte::page')

@section ('title_prefix', 'Users - ')

@section('content')
    <div class="row">
        <div class="card card-mini">
            <div class="card-header">
                <h1 class="m0 text-dark card-title text-xl">
                    {{$item->name_it}}
                </h1>
                <div class="card-action">
                    <a href="{{ route('users.edit',$item->id) }}">
                        <i class="fas fa-pencil-alt fa-3x fa-fw" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-arrow-circle-left fa-3x fa-fw" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-5">


                    <div class="col-md-6 col-sm-12">
                        <div class="section">
                            <div class="section-title"><h3>Information</h3></div>
                            <div class="section-body">
                                <label class="control-label">ID:</label> {{ $item->id }}
                                <br/>
                                <label class="control-label">Name</label> {{ $item->name }}
                                <br/>
                                <label class="control-label">Email:</label> {{ $item->email }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="section-title"><h3>Roles</h3></div>
                        <div class="section-body">
                            <label class="control-label">Role:</label>
                            @foreach ($item->roles as $role)
                                    {{ $role->display_name }}
                                @endforeach

                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
@endsection
