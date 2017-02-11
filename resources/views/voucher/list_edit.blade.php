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
        <h1>List All</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                @if (count($vouchers) != 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>Chave</th> -->
                            <th>Valor do desconto</th>
                            <th>Descição</th>
                            <th>Usuário</th>
                            <th>Data de inicio</th>
                            <th>Data do fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $voucher)
                        <tr @if ($voucher->status == 0) class="success" @else class="warning" @endif >
                            <th scope="row" style="vertical-align: middle !important;">{{ $voucher->id }}</th>
                            <!-- <td>{{ strtoupper ($voucher->chave) }}</td> -->
                            <td>
                                @if ($voucher->desconto_tipo == 0)
                                {{ $voucher->desconto_valor }} %
                                @else
                                R$ {{ $voucher->desconto_valor }}
                                @endif
                            </td>
                            <td style="text-align: justify !important;">{{ $voucher->desconto_descricao }}</td>
                            
                            <td>{{ $voucher->user->name }}</td>
                            
                            <td>{{ Carbon\Carbon::parse($voucher->data_inicio)->format('d\\\m\\\Y\ - H:i:s') }}</td>
                            <td>{{ Carbon\Carbon::parse($voucher->data_fim)->format('d\\\m\\\Y - H:i:s') }}</td>
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