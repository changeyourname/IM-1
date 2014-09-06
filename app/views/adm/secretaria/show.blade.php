@extends('layouts.main')    
 
@section('content')
<a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="{{ URL::to('secretaria/') }}"><i class="fa fa-arrow-circle-o-left"></i> Voltar</a>
<div style="clear: both;"></div>
<section class="panel">
    <header class="panel-heading">
        Dados {{ $secretaria->nome }}
    </header>
    <div class="panel-body">
            <div class="form-group">
            {{ Form::label('nome', 'Nome :') }}
            {{ Form::label('nome', $secretaria->nome) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Sigla :') }}
            {{ Form::label('nome', $secretaria->sigla) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'CEP :') }}
            {{ Form::label('nome', $secretaria->cep) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'UF :') }}
            {{ Form::label('nome', $secretaria->uf) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Cidade :') }}
            {{ Form::label('nome', $secretaria->cidade) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Bairro :') }}
            {{ Form::label('nome', $secretaria->bairro) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Logradouro :') }}
            {{ Form::label('nome', $secretaria->logradouro) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Numero :') }}
            {{ Form::label('nome', $secretaria->numero) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Complemento :') }}
            {{ Form::label('nome', $secretaria->complemento) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Latitude :') }}
            {{ Form::label('nome', $secretaria->lat) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Longitude :') }}
            {{ Form::label('nome', $secretaria->lng) }}
            </div>
            
            <div class="form-group">
            {{ Form::label('nome', 'Ativo :') }}
            {{ Form::label('nome', (($secretaria->ativo==1)?"Sim":"Não")) }}
            </div>            
    </div>
</section>
@stop
