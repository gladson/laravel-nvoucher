@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Atualizar - {{ $user->name }}</div>
                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ Form::model($user, array('route' => array('user_update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form')) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Nome', array('class' => 'col-md-4 control-label', 'for' => 'name')) }}
                            <div class="col-md-6">
                                {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'nome', 'required',  'autofocus')) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', 'E-Mail', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::email('email', null, array('class' => 'form-control', 'id' => 'email', 'required', 'autofocus')) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {{ Form::submit('Atualizar', array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection