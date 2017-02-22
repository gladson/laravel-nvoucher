@extends('layouts.app')

@section('style')
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    /*------ utiltity classes -----*/
    .fl{ float:left; }
    .fr{ float: right; }
    /*its also known as clearfix*/
    .group:before,
    .group:after {
        content: "";
        display: table;
    } 
    .group:after {
        clear: both;
    }
    .group {
        zoom: 1;  /*For IE 6/7 (trigger hasLayout) */
    }

    .pricing-table {
        width: 80%;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 50px;
        margin-left: auto;
        text-align: center;
        padding: 10px;
        padding-right: 0;
    }
    .pricing-table .heading{
        color: #9C9E9F;
        text-transform: uppercase;
        font-size: 1.3rem;
        margin-bottom: 4rem;
    }
    .block{
        width: 30%;    
        margin: 0 10px;
        overflow: hidden;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;    
    /*    border: 1px solid red;*/
    }
    /*Shared properties*/
    .title,.pt-footer{
        color: #FEFEFE;
        text-transform: capitalize;
        line-height: 2.5;
        position: relative;
    }
    .content{
        position: relative;
        color: #FEFEFE;
        padding: 20px 0 10px 0;
    }
    /*arrow creation*/
    .content:after, .content:before,.pt-footer:before,.pt-footer:after {
        top: 100%;
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }
    .pt-footer:after,.pt-footer:before{
        top:0;
    }
    .content:after,.pt-footer:after {
        border-color: rgba(136, 183, 213, 0);   
        border-width: 5px;
        margin-left: -5px;
    }
    /*/arrow creation*/
    .price{
        position: relative;
        display: inline-block;
        margin-bottom: 0.625rem;
    }
    .price span{    
        font-size: 6rem;
        letter-spacing: 8px;
        font-weight: bold;        
    }
    .price .r_p{
        font-size: 4.5rem;    
    }
    .hint{
        font-style: italic;
        font-size: 0.9rem;
    }
    .features{
        list-style-type: none;    
        background: #FFFFFF;
        text-align: left;
        color: #9C9C9C;
        padding:30px 22%;
        font-size: 0.9rem;
    }
    .features li{
        padding:15px 0;
        width: 100%;
    }
    .features li span{
       padding-right: 0.4rem; 
    }
    .pt-footer{
        font-size: 0.95rem;
        text-transform: capitalize;
    }
    /*CUPON_ONE*/
    .cupom_one .title{
        background: #209352;
        font-size: 30px;
        margin-top: 22px;
        margin-bottom: 11px;
    }
    .cupom_one .content,.cupom_one .pt-footer{
        background: #28B164;
    }
    .cupom_one .content:after{   
        border-top-color: #28B164;  
    }
    .cupom_one .pt-footer:after{
        border-top-color: #FFFFFF;
    }
    /*CUPON_TWO*/
    .cupom_two .title{
        background: #E3536C;
    }
    .cupom_two .content,.cupom_two .pt-footer{
        background: #EB6379;
    }
    .cupom_two .content:after{   
        border-top-color: #EB6379;  
    }
    .cupom_two .pt-footer:after {    
        border-top-color: #FFFFFF;  
    }
</style>
@endsection

@section('script')

@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Lista de vouchers</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('danger') }}
                </div>
            @endif
            <div class="pricing-table group">
                @foreach ($keys as $obj)    
                <div class="block @if ($obj->status == 1) cupom_one @else cupom_two @endif fl">
                    
                    <div class="content">
                        <p class="price">
                            @if ($obj->desconto_tipo == 0)
                            <span>-{{ $obj->desconto_valor }}</span>
                            <span class="r_p">%</span>
                            @else
                            <span class="r_p">-R$</span>
                            <span>{{ $obj->desconto_valor }}</span>
                            @endif
                        </p>
                        <p>{{ $obj->desconto_descricao }}</p>
                    </div>
                    @if ($obj->status == 1)
                    <form method="POST" action="{{ route('voucher_list_keys_add_post', $obj->id) }}">
                        <input type="hidden" name="id" value="{{ $obj->id }}">
                        {!! csrf_field() !!}
                        <button type="submit" class="title btn-block">
                            GERAR CUPOM
                        </button>
                    </form>
                    @else
                        <h2 class="title">FECHADO</h2>
                    @endif
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection