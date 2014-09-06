@extends('layouts.main')    
 
@section('content')
<a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="{{ URL::to('unidadeAdm/') }}"><i class="fa fa-arrow-circle-o-left"></i> Voltar</a>
<div style="clear: both;"></div>
<section class="panel">
    <header class="panel-heading">
        Dados {{ $unidade->nome }}
    </header>
    <div class="panel-body">
            <div class="form-group">
            {{ Form::label('nome', 'Nome :') }}
            {{ Form::label('nome', $unidade->nome) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'Login :') }}
            {{ Form::label('nome', $unidade->login) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'E-mail :') }}
            {{ Form::label('nome', $unidade->email) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'Ativo :') }}
            {{ Form::label('nome', $unidade->ativo) }}
            </div>            
    </div>
</section>
@stop