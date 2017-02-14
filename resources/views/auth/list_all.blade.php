@extends('layouts.app')
@section('style')
<style type="text/css">
    .vertical_align{
        vertical-align: middle;
    }
    .table > thead > tr > th {
        text-align: center;
        vertical-align: middle;
    }
    .table > tbody > tr > td {
        text-align: center;
        vertical-align: middle;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <h1>Todos os usuários</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                @if (count($user_all) != 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Data de criação</th>
                            <th>Status</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_all as $obj)
                        <tr @if ($obj->status == 1) class="success" @else class="warning" @endif >
                            <th scope="row" style="vertical-align: middle !important;">
                                {{ $obj->id }}
                            </th>

                            <td>{{ strtoupper ($obj->name) }}</td>

                            <td>
                                {{ $obj->email }}
                            </td>
                            
                            <td>
                                @if ($obj->admin == 1)
                                    Administrador 
                                @else 
                                    Normal
                                @endif
                            </td>
                            
                            <td>
                                {{ Carbon\Carbon::parse($obj->created_at)->format('d\\\m\\\Y\ - H:i:s') }}
                            </td>
                            <td>
                                <a href="{{ route('user_update_status', $obj->id) }}" class="btn btn-primary">
                                     O
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('user_edit', $obj->id) }}" class="btn btn-primary">
                                    X
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Desculpe, mas não foi cadastrado nenhum desconto.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection