@extends('layouts.app')
@section('style')
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
@endsection
@section('content')
<div class="container">
    <div class="page-header">
        <h1>Todos as chaves</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                @if (count($keys) != 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Chave</th>
                            <th>Valor do desconto</th>
                            <th>Descição</th>
                            @if (Auth::check() && Auth::user()->IsAdmin())
                            <th>Usuário</th>
                            @endif
                            <th>Data de inicio</th>
                            <th>Data do fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keys as $obj)
                        <tr @if ($obj->status == 0) class="success" @else class="warning" @endif >
                            <th scope="row" style="vertical-align: middle !important;">
                                {{ $obj->id }}
                            </th>

                            <td>{{ strtoupper ($obj->chave) }}</td>

                            <td>
                                @if ($obj->voucher->desconto_tipo == 0)
                                {{ $obj->voucher->desconto_valor }} %
                                @else
                                R$ {{ $obj->voucher->desconto_valor }}
                                @endif
                            </td>
                            <td style="text-align: justify !important;">
                                {{ $obj->voucher->desconto_descricao }}
                            </td>
                            
                            @if (Auth::check() && Auth::user()->IsAdmin())
                            <td>{{ $obj->user->name }}</td>
                            @endif
                            
                            <td>
                                {{ Carbon\Carbon::parse($obj->data_inicio)->format('d\\\m\\\Y\ - H:i:s') }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($obj->data_fim)->format('d\\\m\\\Y - H:i:s') }}
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