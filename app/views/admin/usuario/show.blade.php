@extends('layouts.main')    
 
@section('content')
<a class="btn btn-info" style="margin-bottom: 10px; padding: 10px; float: right;" href="{{ URL::to('usuario/') }}"><i class="fa fa-arrow-circle-o-left"></i> Voltar</a>
<div style="clear: both;"></div>
<section class="panel">
    <header class="panel-heading">
        Dados {{ $usuario->nome }}
    </header>
    <div class="panel-body">
            <div class="form-group">
            {{ Form::label('nome', 'Nome :') }}
            {{ Form::label('nome', $usuario->nome) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'Login :') }}
            {{ Form::label('nome', $usuario->login) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'E-mail :') }}
            {{ Form::label('nome', $usuario->email) }}
            </div>
            <div class="form-group">
            {{ Form::label('nome', 'Ativo :') }}
            {{ Form::label('nome', $usuario->ativo) }}
            </div>            
    </div>
</section>
@stop
