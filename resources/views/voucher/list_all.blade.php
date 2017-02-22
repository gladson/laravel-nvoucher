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
            <div class="col-md-5">
                <h1>Todos os vouchers</h1>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-2" style="text-align: right;">
                
                <a href="{{ route('voucher_list_add') }}" class="btn btn-primary" style="margin-top: 22px;margin-bottom: 11px;">
                    Add Voucher
                </a>
            </div>
        </div>
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
                            @if (Auth::check() && Auth::user()->IsAdmin())
                            <th>Usuário</th>
                            @endif
                            <th>Status</th>
                            <th>Data de inicio</th>
                            <th>Data do fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $obj)
                        <tr @if ($obj->status == 1) class="success" @else class="warning" @endif >
                            <th scope="row" style="vertical-align: middle !important;">
                                {{ $obj->id }}
                            </th>

                            <!-- <td>{{ strtoupper ($obj->chave) }}</td> -->

                            <td>
                                @if ($obj->desconto_tipo == 0)
                                {{ $obj->desconto_valor }} %
                                @else
                                R$ {{ $obj->desconto_valor }}
                                @endif
                            </td>
                            <td style="text-align: justify !important;">
                                {{ $obj->desconto_descricao }}
                            </td>
                            
                            @if (Auth::check() && Auth::user()->IsAdmin())
                            <td>{{ $obj->user->name }}</td>
                            @endif
                            
                            <td>
                                <a href="{{ route('update_voucher', $obj->id) }}" class="btn btn-primary">
                                     O
                                </a>
                            </td>
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