@extends('layouts.main')    
 
@section('content')
<a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="{{ URL::to('cargo/') }}"><i class="fa fa-arrow-circle-o-left"></i> Voltar</a>
<div style="clear: both;"></div>
<section class="panel">
    <header class="panel-heading">
        Dados {{ $cargo->nome }}
    </header>
    <div class="panel-body">
            <div class="form-group">
            {{ Form::label('nome', 'Nome :') }}
            {{ Form::label('nome', $cargo->nome) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', utf8_encode('Descrição :')) }}
            {{ Form::label('nome', utf8_encode($cargo->descricao)) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'Ativo :') }}
            {{ Form::label('nome', (($cargo->ativo==1)?"Sim":"Não")) }}
            </div>            
    </div>
</section>
@stop
