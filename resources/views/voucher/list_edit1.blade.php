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
        margin: 0 15px;
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

@section('content')
<div class="container">
    <div class="page-header">
        <h1>List All</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pricing-table group">
                <div class="block cupom_one fl">
                    
                    <div class="content">
                        <p class="price">
                            <span class="r_p">-R$</span>
                            <span>23</span>
                        </p>
                        <p>CUPOM 1</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_two fl">
                    <div class="content">
                        <p class="price">
                            <span class="r_p">-R$</span>
                            <span>24</span>
                        </p>
                        <p>CUPOM 2</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_one fl">
                    <div class="content">
                        <p class="price">
                            <span>-10</span>
                            <span class="r_p">%</span>
                        </p>
                        <p>CUPOM 3</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_two fl">
                    <div class="content">
                        <p class="price">
                            <span class="r_p">-R$</span>
                            <span>45</span>
                        </p>
                        <p>CUPOM 4</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_one fl">
                    <div class="content">
                        <p class="price">
                            <span>-10</span>
                            <span class="r_p">%</span>
                        </p>
                        <p>CUPOM 5</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_two fl">
                    <div class="content">
                        <p class="price">
                            <span class="r_p">-R$</span>
                            <span>55</span>
                        </p>
                        <p>CUPOM 6</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_one fl">
                    
                    <div class="content">
                        <p class="price">
                            <span class="r_p">-R$</span>
                            <span>20</span>
                        </p>
                        <p>CUPOM 7</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_two fl">
                    <div class="content">
                        <p class="price">
                            <span class="r_p">-R$</span>
                            <span>15</span>
                        </p>
                        <p>CUPOM 8</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
                <div class="block cupom_one fl">
                    <div class="content">
                        <p class="price">
                            <span>-38</span>
                            <span class="r_p">%</span>
                        </p>
                        <p>CUPOM 9</p>
                    </div>
                    <a href="#">
                        <h2 class="title">CODIGO1234</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection