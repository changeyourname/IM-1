@extends('layouts.main')    
@section('content')
@if(Session::has('message'))
<div class="alert alert-info fade in">
    <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <div class="alert-info">{{Session::get('message')}}</div>
</div>
@endif
<?php
    $Grid = new DataGrid("Cargo","NOME,ATIVO","nome,ativo",$cargo,"cargo","id_adm_cargo");
    $Grid->SetVisualizar();
    $Grid->SetEditar();
    $Grid->SetExcluir();
    $Grid->CriarGrid();
    
?>

@stop

