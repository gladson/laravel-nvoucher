@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.14.3/daterangepicker.min.css" />
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/pt-br.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.14.3/jquery.daterangepicker.min.js"></script>
<script type="text/javascript">
    $.dateRangePickerLanguages['pt-BR'] = 
        {
            'selected': 'Escolha:',
            'days': 'Dias',
            'apply': 'Fechar',
            'week-1' : 'Seg',
            'week-2' : 'Ter',
            'week-3' : 'Qua',
            'week-4' : 'Qui',
            'week-5' : 'Sex',
            'week-6' : 'Sab',
            'week-7' : 'Dom',
            'month-name': ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Júlio','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            'shortcuts' : 'Atalhos',
            'past': 'Colar',
            '7days' : '7 dias',
            '14days' : '14 dias',
            '30days' : '30 dias',
            'previous' : 'Anterior',
            'prev-week' : 'Semana',
            'prev-month' : 'Mês',
            'prev-quarter' : 'Trimestre',
            'prev-year' : 'Ano',
            'less-than' : 'O intervalo de datas deve ser superior a %d dias',
            'more-than' : 'O intervalo de datas deve ser inferior a %d dias',
            'default-more' : 'Selecione um período maior do que %d dias',
            'default-less' : 'Selecione um período inferior a %d dias',
            'default-range' : 'Selecione um intervalo de datas entre %d e %d dias',
            'default-default': 'Este é um idioma customizado. ;D'
    };
    $('#campos-datas-inicio-fim').dateRangePicker(
        {
            language:'auto',
            separator : '<br> para <br>',
            getValue: function()
            {
                if ($('#data_inicio_rp').val() && $('#data_fim_rp').val() )
                    return $('#data_inicio_rp').val() + ' para ' + $('#data_fim_rp').val();
                else
                    return '';
            },
            setValue: function(s,s1,s2)
            {
                $('#data_inicio_rp').val(s1);
                $('#data_fim_rp').val(s2);

                //console.log(s1);
                var s1_moment = moment(s1, 'dddd Do [de] MMM, YYYY - HH:mm[hs]').format('YYYY-MM-DD HH:mm:ss');
                $('#data_inicio').val(s1_moment);

                //console.log(s2);
                var s2_moment = moment(s2, 'dddd Do [de] MMM, YYYY - HH:mm[hs]').format('YYYY-MM-DD HH:mm:ss');
                $('#data_fim').val(s2_moment);
            },
            format: 'dddd Do [de] MMM, YYYY - HH:mm[hs]',
            //format: 'D/MM/YYYY HH:mm:ss',
            time: {
                enabled: true
            },
            defaultTime: moment().startOf('day').toDate(),
            defaultEndTime: moment().endOf('day').toDate()
    });
    
    $(document).ready(function() {
        
        $('#desconto_tipo').change(function() {
            if($(this).prop('checked') == true){
                console.log(true);
                $("#desconto_tipo_checkbox").after('<span class="input-group-addon" id="desconto_tipo_checkbox_check_0">R$</span>');
                $('#desconto_tipo_checkbox_check_1').remove();
                $('#desconto_tipo').val(0);
            } else {
                console.log(false);
                $("#desconto_valor").after('<span class="input-group-addon" id="desconto_tipo_checkbox_check_1">%</span>');
                $('#desconto_tipo_checkbox_check_0').remove();
                $('#desconto_tipo').val(1);
            };
        });
        $("#desconto_tipo_checkbox").after('<span class="input-group-addon" id="desconto_tipo_checkbox_check_0">R$</span>');
    });
    
</script>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Add voucher</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('voucher_list_add_post') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('desconto_valor') ? ' has-error' : '' }}{{ $errors->has('desconto_tipo') ? ' has-error' : '' }}">
                            <label for="desconto_valor" class="col-md-4 control-label">Valor/Tipo</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                   <span class="input-group-addon" id="desconto_tipo_checkbox">
                                        <input type="checkbox" checked id="desconto_tipo" name="desconto_tipo" value="0">
                                   </span>
                                   
                                   <input id="desconto_valor" type="text" class="form-control" name="desconto_valor" value="{{ old('desconto_valor') }}" required autofocus>
                                   
                                </div><!-- /input-group -->

                                @if ($errors->has('desconto_valor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desconto_valor') }}</strong>
                                    </span>
                                @endif

                                 @if ($errors->has('desconto_tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desconto_tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('data_inicio') ? ' has-error' : '' }}{{ $errors->has('data_fim') ? ' has-error' : '' }}">
                            <label for="data_inicio" class="col-md-4 control-label">Data inicio e fim</label>

                            <div class="col-md-6">
                                <div id="campos-datas-inicio-fim">
                                    <input id="data_inicio_rp" type="text" class="form-control" value="">
                                    <input type="hidden" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}">
                                    para 
                                    <input id="data_fim_rp" type="text" class="form-control" value="">
                                    <input type="hidden" id="data_fim" name="data_fim" value="{{ old('data_fim') }}">
                                </div>

                                @if ($errors->has('data_inicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_inicio') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('data_fim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_fim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('desconto_descricao') ? ' has-error' : '' }}">
                            <label for="desconto_descricao" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <textarea name="desconto_descricao" id="desconto_descricao" class="form-control" rows="5" required>{{ old('desconto_descricao') }}</textarea>

                                @if ($errors->has('desconto_descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desconto_descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection