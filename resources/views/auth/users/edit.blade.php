@extends('adminlte::page')

@section ('title_prefix', 'Users - ')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-mini">
                <div class="card-header">
                    <h1 class="m0 text-dark card-title text-xl">
                        Edit User
                    </h1>
                    <div class="card-action">
                        <a href="{{ route('users.index') }}">
                            <i class="fas fa-arrow-circle-left fa-3x fa-fw" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        {!! Form::model($item, ['method' => 'PATCH','route' => ['users.update', $item->id], 'enctype' => 'multipart/form-data'] ) !!}

                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <div class="form-group">
                                <label for="name">Email</label>
                                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="col-xs-6 col-md-3">
                            <div class="form-group">
                                <label for="address">Password</label>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role">
                                    <option value="">--- Scegli ---</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}" {{ $selectedRole === $role->name ? 'selected="selected"' : '' }}>{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                </div>


                <div class="row padding">
                    <div class="col-md-12 col-xs-12 center">
                        <div class="form-group">
                            <!--
                            <input type="submit" value="Save" class="submit" name="submit" id="btn-structures" />
                            -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                            </button>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection










