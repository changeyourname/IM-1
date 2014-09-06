@extends('layouts.main')    
 
@section('content')
<a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="{{ URL::to('sistema/') }}"><i class="fa fa-arrow-circle-o-left"></i> Voltar</a>
<div style="clear: both;"></div>
<section class="panel">
    <header class="panel-heading">
        Dados {{ $sistema->nome }}
    </header>
    <div class="panel-body">
            <div class="form-group">
            {{ Form::label('nome', 'Nome :') }}
            {{ Form::label('nome', $sistema->nome) }}
            </div>
            <div class="form-group">
            {{ Form::label('url', 'URL :') }}
            {{ Form::label('url', $sistema->url) }}
            </div>
            <div class="form-group">
            {{ Form::label('icone', 'Icone :') }}
            {{ Form::label('icone', $sistema->icone) }}
            </div>
            <div class="form-group">
            {{ Form::label('ativo', 'Ativo :') }}
            {{ Form::label('ativo', (($sistema->ativo==1)?'Sim':'Não')) }}
            </div>
            
    </div>
</section>
@stop
